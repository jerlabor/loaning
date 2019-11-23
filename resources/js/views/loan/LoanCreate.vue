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
                                <label class="col-md-3 col-form-label" for="borrower">Borrower</label>
                                <div class="col-md-9">
                                    <v-select :options="api.borrowers"
                                              input-id="borrower"
                                              label="full_name"
                                              v-model="loan.borrower_id"
                                    >
                                        <template #search="{attributes, events}">
                                            <input
                                                :required="!loan.borrower_id"
                                                class="vs__search"
                                                v-bind="attributes"
                                                v-on="events"
                                            />
                                        </template>
                                    </v-select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="pension_code">Pension Code</label>
                                <div class="col-md-9">
                                    <v-select :options="api.pensions"
                                              input-id="pension_code"
                                              v-model="loan.pension_code"
                                              >
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
                            <div v-if="loan.pension_code && loan.borrower_id">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="loan_type">Loan Type</label>
                                <div class="col-lg-9">
                                    <select class="custom-select" id="loan_type" required v-model="loan.loan_type">
                                        <option selected>Open this select menu</option>
                                        <option v-for="(type,id) in options.loanTypes" :value="id+1">{{type}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="principal_amount">Principal Amount</label>
                                <div class="col-lg-9">
                                    <input class="form-control" id="principal_amount" required
                                           type="number" v-model="loan.principal_amount" :max="maximum_principal_amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="release_date">Loan Release Date</label>
                                <div class="col-lg-9">
                                    <input class="form-control" id="release_date" required
                                           type="date" v-model="loan.release_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="term">Term</label>
                                <div class="col-lg-9">
                                    <select class="custom-select" id="term" required v-model="loan.term">
                                        <option v-for="n in 12">{{n}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                     </form>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder" for="current_pension">Current
                                Pension</label>
                            <div class="col-sm-10">
                                <input class="form-control-plaintext" id="current_pension" readonly type="number"
                                       value="0">
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
        <button class="btn btn-primary mt-3" form="loanCreate" type="submit" :disabled="isProcessing || cantSubmitForm">Submit</button>
    </div>
</template>

<script>
    export default {
        name: "LoanCreate",
        created() {
            this.getPensions();
            this.getBorrowers();
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
                    console.log(val);
                    let borrower = val.borrower;
                    current_pensionEl.value = val.pension;
                    // birthdayEl.value = `${borrower.birthday} (${borrower.age} yrs. old)`;
                } else {
                    borrowerEl.value = '';
                    current_pensionEl.value = '';
                    birthdayEl.value = '';
                }
            },
            'loan.borrower_id'(borrower){

                // check if borrower has existing loan
                if(parseInt(borrower.loans_count) > 0){
                    this.options.loanTypes.includes('New') ? this.options.loanTypes.shift() : ''
                }else{
                    !this.options.loanTypes.includes('New') ? this.options.loanTypes.unshift('New') : ''
                }

                // check if loans status of has ongoing
                 this.cantSubmitForm = borrower.active_loan;
            }
        }
        , methods: {
            checkBorrowerLoanDetails(){

            },
            checkURLForPension(){
                let pension_id = this.$route.query.pension;
                if(pension_id){
                    let pension = this.api.pensions.find(pension => {
                        return pension.id == pension_id;
                    });
                    this.loan.pension_code = pension;
                }
            },checkURLForBorrower(){
                let barrower_id = this.$route.query.borrower;
                if(barrower_id){
                    let borrower = this.api.borrower.find(borrower => {
                        return borrower.id == barrower_id;
                    });
                    this.loan.borrower_id = borrower;
                }
            },
            getPensions() {
                axios.get('/api/pension')
                    .then(response => {
                        this.api.pensions = response.data.data;
                    })
                    .catch(e => {
                        alert(e);
                    })
                    .finally(() => {
                        this.checkURLForPension();
                    })
            }
            ,getBorrowers(){
                axios.get('/api/borrowers')
                    .then(response => {
                        this.api.borrowers = response.data.data;
                    })
                    .catch(e => {
                        alert(e);
                    })
                    .finally(() => {
                        this.checkURLForBorrower();
                    })
            }
            ,loanCreate(){
                this.isProcessing = true;
                axios.post('/loan',this.loan)
                    .then(response => {
                        this.$router.push(response.data.links.view)
                    })
                    .catch(e => {
                        alert(e);
                    }).
                    finally(() => {
                        this.isProcessing = false;
                     })
            }
        }
        , data() {
            return {
                api: {
                    pensions: [],
                    borrowers: []
                },
                options: {
                  loanTypes: [
                      'New',
                      'Renewal',
                      'Advance Bonus',
                      'Salary',
                  ]
                },
                loan: {
                    borrower_id: null,
                    pension_code: null,
                    loan_type: null,
                    principal_amount: null,
                    term: null,
                    release_date: null
                },
                isProcessing: false,
                interest: 2.5,
                maximum_principal_amount: 15000,
                miscellaneous_fee: 300,
                cantSubmitForm: true
            }
        }
    }
</script>

<style scoped>

</style>
