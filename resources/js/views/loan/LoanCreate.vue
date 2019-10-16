<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add Loan
            </div>
            <div class="card-body">
                <form class="loanCreate">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="borrower" class="col-sm-2 col-form-label">Borrower</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="borrower">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pension Code</label>
                                <div class="col-sm-10">
                                    <v-select v-model="loan.pension_code" :options="api.pensions" label="id"></v-select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_pension" class="col-sm-2 col-form-label">Current Pension</label>
                                <div class="col-sm-10">
                                    <input type="number" readonly class="form-control-plaintext" id="current_pension"
                                           value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="birthday">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Loan Type</label>
                        <div class="col-sm-10">
                            <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Principal Amount</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
                        <div class="col-sm-10">
                            <select class="custom-select">
                                <option v-for="n in 12">{{n}}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoanCreate",
        created() {
            this.getPensions();
        }
        , watch: {
            'loan.pension_code'(val) {
                let borrowerEl,current_pensionEl,birthdayEl;
                borrowerEl = document.getElementById('borrower');
                current_pensionEl = document.getElementById('current_pension');
                birthdayEl = document.getElementById('birthday');

                if (val) {
                    let borrower = val.borrower;
                    borrowerEl.value = borrower.full_name;
                    current_pensionEl.value = val.pension;
                    birthdayEl.value = `${borrower.birthday} (${borrower.age} yrs old)`;
                }else {
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
        }
        , components: {}
        , data() {
            return {
                api: {
                    pensions: []
                },
                loan: {
                    pension_code: null
                }
            }
        }
    }
</script>

<style scoped>

</style>
