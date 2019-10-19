<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add Loan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form class="loanCreate" id="loanCreate" @submit.prevent="loanCreate">

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="pension_code">Pension Code</label>
                                <div class="col-md-9">
                                    <v-select :options="api.pensions" input-id="pension_code" label="id"
                                              v-model="loan.pension_code">
                                        <template #search="{attributes, events}">
                                            <input
                                                :required="!loan.pension_code"
                                                class="vs__search"
                                                v-bind="attributes"
                                                v-on="events"
                                            />
                                        </template>
                                    </v-select>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="loan_type">Loan Type</label>
                                <div class="col-md-9 col-lg-4">
                                    <select class="custom-select" id="loan_type" required v-model="loan.loan_type">
                                        <option selected>Open this select menu</option>
                                        <option value="1">New</option>
                                        <option value="2">Renewal</option>
                                        <option value="2">Addition</option>
                                        <option value="3">Reactive</option>
                                        <option value="3">Advance Bonus</option>
                                        <option value="3">Salary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="principal_amount">Principal Amount</label>
                                <div class="col-md-9 col-lg-4">
                                    <input class="form-control" id="principal_amount" required
                                           type="number" v-model="loan.principal_amount" :max="maximum_principal_amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="release_date">Loan Release Date</label>
                                <div class="col-md-9 col-lg-4">
                                    <input class="form-control" id="release_date" required
                                           type="date" v-model="loan.release_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="term">Term</label>
                                <div class="col-md-9 col-lg-4">
                                    <select class="custom-select" id="term" required v-model="loan.term">
                                        <option v-for="n in 12">{{n}}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="borrower">Borrower</label>
                            <div class="col-sm-10">
                                <input class="form-control-plaintext" id="borrower" readonly type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="current_pension">Current
                                Pension</label>
                            <div class="col-sm-10">
                                <input class="form-control-plaintext" id="current_pension" readonly type="number"
                                       value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="birthday">Birthday</label>
                            <div class="col-sm-10">
                                <input class="form-control-plaintext" id="birthday" readonly type="text">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="total_loan">Total
                                Loan</label>
                            <div class="col-sm-8">
                                <input :value="totalLoan" class="form-control-plaintext" id="total_loan" readonly
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="total_interest">Total
                                Interest (<i>{{totalInterest}}%</i>)</label>
                            <div class="col-sm-8">
                                <input :value="totalAmountOfInterest" class="form-control-plaintext" id="total_interest" readonly
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="miscellaneous_fee">Miscellaneous
                                Fee</label>
                            <div class="col-sm-8">
                                <input :value="miscellaneous_fee" class="form-control-plaintext" id="miscellaneous_fee" readonly
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="net">Net</label>
                            <div class="col-sm-8">
                                <input :value="net" class="form-control-plaintext" id="net" readonly
                                       type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font-weight-bolder" for="maximum_principal_amount">Maximum Principal Amount</label>
                            <div class="col-sm-10">
                                <input :value="maximum_principal_amount" class="form-control-plaintext" id="maximum_principal_amount" readonly
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font-weight-bolder" for="base_interest">Base
                                Interest</label>
                            <div class="col-sm-10">
                                <input :value="interest + '%'" class="form-control-plaintext" id="base_interest" readonly
                                       type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3" form="loanCreate" type="submit">Submit</button>
    </div>
</template>

<script>
    export default {
        name: "LoanCreate",
        created() {
            this.getPensions();
        }
        , computed: {
            totalLoan() {
                return this.loan.principal_amount * this.loan.term;
            },
            totalInterest() {
                return this.interest * this.loan.term;
            },
            totalAmountOfInterest() {
                return (this.totalInterest / 100) * this.totalLoan;
            },
            net() {
                return this.totalLoan - (this.totalAmountOfInterest + this.miscellaneous_fee);
            }
        }
        , watch: {
            'loan.pension_code'(val) {
                let borrowerEl, current_pensionEl, birthdayEl;
                borrowerEl = document.getElementById('borrower');
                current_pensionEl = document.getElementById('current_pension');
                birthdayEl = document.getElementById('birthday');

                if (val) {
                    let borrower = val.borrower;
                    borrowerEl.value = borrower.full_name;
                    current_pensionEl.value = val.pension;
                    birthdayEl.value = `${borrower.birthday} (${borrower.age} yrs. old)`;
                } else {
                    borrowerEl.value = '';
                    current_pensionEl.value = '';
                    birthdayEl.value = '';
                }
            }
        }
        , methods: {
            getPensions() {
                axios.get('/api/pension')
                    .then(response => {
                        this.api.pensions = response.data.data;
                    })
                    .catch(e => {
                        console.log(e);
                    })
            }
            ,loanCreate(){
                axios.post('/loan',this.loan)
                    .then(response => {
                        this.$router.push(response.data.data.links.view)
                    })
                    .catch(e => {

                    })
            }
        }
        , components: {}
        , data() {
            return {
                api: {
                    pensions: []
                },
                loan: {
                    pension_code: null,
                    loan_type: null,
                    principal_amount: null,
                    term: null,
                    release_date: null
                },
                interest: 2.5,
                maximum_principal_amount: 15000,
                miscellaneous_fee: 300
            }
        }
    }
</script>

<style scoped>

</style>
