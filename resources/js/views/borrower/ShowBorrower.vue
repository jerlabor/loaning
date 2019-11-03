<template>
    <div>
        <mdb-modal :show="showPensionModal" @close="showPensionModal = false">
            <mdb-modal-header class="text-center">
                <mdb-modal-title bold class="w-100" tag="h4">Add Pension</mdb-modal-title>
            </mdb-modal-header>
            <mdb-modal-body class="mx-3 grey-text">
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
            </mdb-modal-body>
            <mdb-modal-footer center>
                <mdb-btn :disabled="isProcessing" @click.native="storePension">{{submitText}}</mdb-btn>
            </mdb-modal-footer>
        </mdb-modal>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Borrower
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img alt="John Edward R. Labor" class="img-fluid img-thumbnail"
                                 src="/images/defaultprof.png">
                        </div>
                        <div class="col-10" v-if="borrower">
                            <div class="h3">
                                {{borrower.full_name}}
                            </div>
                            <div>
                                {{borrower.birthday}} ({{borrower.age}} y/o)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                            <button @click="showPensionModal=true" class="btn btn-primary btn-sm mb-3" type="button">Add
                                Pension
                                <mdb-icon class="ml-1" icon="plus"/>
                            </button>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">Pension #</th>
                                        <th scope="col">Pension Type</th>
                                        <th scope="col">Bank</th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Bank Type</th>
                                        <th scope="col">PDay</th>
                                        <th scope="col">Account</th>
                                        <th scope="col">Current Pension</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="borrower">
                                    <tr v-for="pension in borrower.pensions">
                                        <th scope="row">{{pension.id}}</th>
                                        <td>{{pension.pension_type}}</td>
                                        <td>{{pension.bank}}</td>
                                        <td>{{pension.brgyDesc}}</td>
                                        <td>{{pension.bank_type}}</td>
                                        <td>{{pension.payday}}</td>
                                        <td>{{pension.agency}}</td>
                                        <td>{{pension.pension}}</td>
                                        <td class="d-flex justify-content-between">
                                            <router-link :to="pension.links.loans"
                                                         class="bg-success text-white font-weight-normal px-1 rounded">Loans
                                            </router-link>
                                            <router-link :to="pension.links.loans">
                                                <mdb-icon icon="edit"/>
                                            </router-link>
                                            <router-link :to="pension.links.loans">
                                                <mdb-icon far icon="trash-alt"/>
                                            </router-link>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import {
        mdbContainer,
        mdbBtn,
        mdbIcon,
        mdbModal,
        mdbModalHeader,
        mdbModalBody,
        mdbModalFooter,
        mdbInput,
        mdbModalTitle
    } from 'mdbvue';

    export default {
        name: "ShowBorrower",
        components: {
            mdbContainer,
            mdbBtn,
            mdbModal,
            mdbModalHeader,
            mdbModalBody,
            mdbModalFooter,
            mdbInput,
            mdbModalTitle,
            mdbIcon
        },
        computed: {
            submitText(){
                return this.isProcessing ? 'Loading...' : 'Submit'
            }
        },
        created() {
            this.getBorrowerPensions();
            this.getSelectOptions();

        },
        methods: {
            axiosGet(model) {
                return axios.get(`/api/${model}`);
            },
            storePension() {

                if (this.isProcessing) {
                    return
                }
                this.isProcessing = true;
                axios.post('/pension', this.pension)
                    .then(response=>{
                        this.getBorrowerPensions();
                        this.showPensionModal= false;
                    })
                    .catch(e => {
                        let error_message;
                        error_message = '';

                        error_message += e.response.data.message;

                        for (let error in e.response.data.errors) {
                            error_message += e.response.data.errors[error];
                        }

                        alert(error_message);
                    })
                    .finally(() => {
                    this.isProcessing = false;
                })
            },
            getSelectOptions() {
                let ShowBorrowerComponent = this;
                axios.all([this.axiosGet('pension/types'), this.axiosGet('banks'), this.axiosGet('philippines/barangays'), this.axiosGet('bank/types'), this.axiosGet('agency/pension')])
                    .then(axios.spread(function (pensionTypes, banks, barangays, bnkTypes, agencies) {
                        ShowBorrowerComponent.selectOptions['pensionTypes'] = pensionTypes.data;
                        ShowBorrowerComponent.selectOptions['bnkTypes'] = bnkTypes.data;
                        ShowBorrowerComponent.selectOptions['agencies'] = agencies.data;
                        ShowBorrowerComponent.selectOptions['banks'] = banks.data;
                        ShowBorrowerComponent.selectOptions['barangays'] = barangays.data.data;
                    }));
            },
            getBorrowerPensions() {
                axios.get(`/api/borrower/${this.$route.params.borrower}`)
                    .then(response => {
                        this.borrower = response.data.data;
                    })
                    .catch(e => {

                    });
            }
        },
        data() {
            return {
                showPensionModal: false,
                isProcessing: false,
                borrower: null,
                pension: {
                    borrower_id: this.$route.params.borrower,
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
    .input--width {
        min-width: 112px;
    }
</style>
