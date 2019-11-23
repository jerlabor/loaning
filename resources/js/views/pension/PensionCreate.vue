<template>
    <div>
      <div class="mb-3 sticky-top">
          <button @click="$router.go(-1)" class="btn btn-danger btn-sm">Back</button>
          <button type="submit" class="btn btn-primary btn-sm" form="storePensionFrm">Submit</button>
      </div>
        <div class="card">
            <div class="card-header">
                Pension Information Data
            </div>
            <div class="card-body">
                <form v-if="!isProcessing" @submit="storePension" id="storePensionFrm">
                    <div class="form-group row">
                        <label for="first_name" class="col-lg-4 col-form-label">First Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="first_name" v-model="pension.first_name"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle_name" class="col-lg-4 col-form-label">Middle Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="middle_name" v-model="pension.middle_name"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-lg-4 col-form-label">Last Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="last_name" v-model="pension.last_name"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pensioner_dob" class="col-lg-4  col-form-label">Birthday</label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control" id="pensioner_dob" v-model="pension.pensioner_dob">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_pension_started" class="col-lg-4  col-form-label">Date Pension Started</label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control" id="date_pension_started" v-model="pension.date_pension_started">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="previous_employer" class="col-lg-4  col-form-label">Previous Employer</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="previous_employer" v-model="pension.employer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="yos" class="col-lg-4  col-form-label">Years of Service</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="yos" v-model="pension.yos">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="savings_acct_num" class="col-lg-4  col-form-label">Savings Account #</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="savings_acct_num" v-model="pension.savings_acct_num">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text input--width" for="pension_type">Pension Type</label>
                        </div>
                        <select class="custom-select" id="pension_type" required v-model="pension.pension_type">
                            <option selected value="0">Choose...</option>
                            <option :value="type.id" v-for="type in selectOptions.pensionTypes">{{type.pension_type}}
                            </option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text input--width" for="pension_bank">Bank</label>
                        </div>
                        <select class="custom-select" id="pension_bank" required v-model="pension.pension_bank">
                            <option selected value="0">Choose...</option>
                            <option :value="bank.id" v-for="bank in selectOptions.banks">{{bank.bank}}</option>

                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="bank_branch">Bank Branch</label>
                        <div class="col-md-9">
                            <v-select :options="selectOptions.barangays" :reduce="brgyDesc => brgyDesc.id" id="bank_branch"
                                      label="brgyDesc" v-model="pension.bank_branch"></v-select>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text input--width" for="bank_type">Bank Type</label>
                        </div>
                        <select class="custom-select" id="bank_type" required v-model="pension.bank_type">
                            <option selected value="0">Choose...</option>
                            <option :value="type.id" v-for="type in selectOptions.bnkTypes">{{type.bank_type}}</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text input--width" for="pension_account">Account</label>
                        </div>
                        <select class="custom-select" id="pension_account" required v-model="pension.pension_agency">
                            <option selected value="0">Choose...</option>
                            <option :value="agency.id" v-for="agency in selectOptions.agencies">{{agency.agency}}</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="payday">Payday</label>
                        <div class="col-8">
                            <input class="form-control" id="payday" max="31" min="1" required type="number"
                                   v-model="pension.payday">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="pension_amount">Current Pension</label>
                        <div class="col-8">
                            <input class="form-control" id="pension_amount" placeholder="Enter Amount" required
                                   type="text" v-model="pension.pension">
                        </div>
                    </div>
                </form>
                <div class="text-center" v-else>
                    <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PensionCreate",
        computed: {
            submitText(){
                return this.isProcessing ? 'Loading...' : 'Submit'
            }
        },
        created() {
            this.getSelectOptions();
        },
        methods: {
            axiosGet(model) {
                return axios.get(`/api/${model}`);
            },
            storePension(e) {
            e.preventDefault();
                if (this.isProcessing) {
                    return
                }
                this.isProcessing = true;
                axios.post('/pension', this.pension)
                    .then((res) =>{
                        this.$router.push(`/pension/${res.data.id}`);
                    })
                    .catch(e => {

                        let message = e;
                        if(e.errors){
                            message = e.errors;
                        }

                        alert(message);
                    })
                    .finally(() => {
                        this.isProcessing = false;
                    })
            },
            getSelectOptions() {
                let PensionCreateComponent = this;
                this.isProcessing = true;
                axios.all([this.axiosGet('pension/types'), this.axiosGet('banks'), this.axiosGet('philippines/barangays'), this.axiosGet('bank/types'), this.axiosGet('agency/pension')])
                    .then(axios.spread(function (pensionTypes, banks, barangays, bnkTypes, agencies) {
                        PensionCreateComponent.selectOptions['pensionTypes'] = pensionTypes.data;
                        PensionCreateComponent.selectOptions['bnkTypes'] = bnkTypes.data;
                        PensionCreateComponent.selectOptions['agencies'] = agencies.data;
                        PensionCreateComponent.selectOptions['banks'] = banks.data;
                        PensionCreateComponent.selectOptions['barangays'] = barangays.data.data;
                    }))
                    .finally( () => this.isProcessing = false);
            },
        },
        data() {
            return {
                isProcessing: false,
                pension: {
                    first_name: null,
                    middle_name: null,
                    last_name: null,
                    pensioner_dob: null,
                    date_pension_started: null,
                    employer: null,
                    yos: null,
                    savings_acct_num: null,
                    pension_type: 0,
                    pension_bank: 0,
                    bank_branch: 0,
                    bank_type: 0,
                    payday: null,
                    pension_agency: 0,
                    pension: 0,
                    added_by: this.$store.state.authUser.id
                },
                selectOptions: {}
            }
        }
    }
</script>

<style scoped>

</style>
