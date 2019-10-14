<template>
    <div>
    <mdb-modal :show="showPensionModal" @close="showPensionModal = false">
        <mdb-modal-header class="text-center">
            <mdb-modal-title tag="h4" bold class="w-100">Add Pension</mdb-modal-title>
        </mdb-modal-header>
        <mdb-modal-body class="mx-3 grey-text">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text input--width" for="pension_type">Pension Type</label>
                </div>
                <select class="custom-select" id="pension_type" v-model="pension.pension_type" required>
                    <option value="0" selected>Choose...</option>
                    <option value="1">Retirement</option>
                    <option value="2">SD</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text input--width"for="pension_bank">Bank</label>
                </div>
                <select class="custom-select" id="pension_bank" v-model="pension.pension_bank" required>
                    <option value="0" selected>Choose...</option>
                    <option value="1">BDO</option>
                    <option value="2">BPI</option>
                    <option value="3">Metrobank</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text input--width" for="bank_branch">Branch</label>
                </div>
                <select class="custom-select" id="bank_branch" v-model="pension.bank_branch" required>
                    <option value="0" selected>Choose...</option>
                    <option value="1">Roxas</option>
                    <option value="2">Matina</option>
                    <option value="3">Toril</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text input--width" for="bank_type">Bank Type</label>
                </div>
                <select class="custom-select" id="bank_type" v-model="pension.bank_type" required>
                    <option value="0" selected>Choose...</option>
                    <option value="1">ATM</option>
                    <option value="2">PB</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text input--width" for="pension_account">Account</label>
                </div>
                <select class="custom-select" id="pension_account" v-model="pension.pension_agency" required>
                    <option value="0" selected>Choose...</option>
                    <option value="1">SSS</option>
                    <option value="2">GSIS</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="payday" class="col-4 col-form-label">Payday</label>
                <div class="col-8">
                    <input type="number" class="form-control" id="payday" min="1" max="31" v-model="pension.payday" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pension_amount" class="col-4 col-form-label">Current Pension</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="pension_amount" placeholder="Enter Amount" v-model="pension.pension" required>
                </div>
            </div>
        </mdb-modal-body>
        <mdb-modal-footer center>
            <mdb-btn @click.native="storePension" :disabled="onProcess">Add</mdb-btn>
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
                        <img src="/images/defaultprof.png" class="img-fluid img-thumbnail" alt="John Edward R. Labor">
                    </div>
                    <div class="col-10">
                        <div>
                            John Edward R. Labor
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-10 p-3">
                        <button type="button" class="btn btn-primary btn-sm mb-3" @click="showPensionModal=true">Add Pension<mdb-icon icon="plus" class="ml-1"/></button>
                        <div class="table-responsive">
                            <table class="table">
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
                                <tbody>
                                <tr v-for="pension in pensions">
                                    <th scope="row">{{pension.id}}</th>
                                    <td>{{pension.pension_type}}</td>
                                    <td>{{pension.pension_bank}}</td>
                                    <td>{{pension.bank_branch}}</td>
                                    <td>{{pension.bank_type}}</td>
                                    <td>{{pension.payday}}</td>
                                    <td>{{pension.pension_agency}}</td>
                                    <td>{{pension.pension}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" :href="pension.links.createLoan"><mdb-icon icon="plus"/> Loan</a>
                                        <a class="btn btn-success btn-sm" :href="pension.links.createLoan"><mdb-icon icon="edit" /></a>
                                        <a class="btn btn-danger btn-sm" :href="pension.links.createLoan"><mdb-icon far icon="trash-alt" /></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div></template>

<script>
    import { mdbContainer, mdbBtn, mdbIcon, mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter, mdbInput, mdbModalTitle } from 'mdbvue';
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
        created(){
          this.getBorrowerPensions();

        },
        methods: {
             axiosGet(model){
                axios.get(`/api/${model}`);
             },
            storePension(){

                if(this.onProcess){
                    return
                }
               this.onProcess = true;
               axios.post('/pension',this.pension).finally(() => {
                   this.onProcess = false;
               })
            },
            getSelectOptions(){
                axios.all([this.axiosGet('pension-types'), this.axiosGet('banks'),this.axiosGet('cities'),this.axiosGet('bank/types'),this.axiosGet('agency/pension')])
                    .then(axios.spread(function (acct, perms) {
                        // Both requests are now complete
                    }));
            },
            getBorrowerPensions(){
                 axios.get(`/api/borrowers/${this.$route.params.borrower}/pensions`)
                     .then(repsonse => {
                         this.pensions = repsonse.data.data;
                     })
                     .catch(e => {

                     });
            }
        },
        data() {
            return {
                showPensionModal: false,
                onProcess: false,
                pension:{
                    borrower_id: this.$route.params.borrower,
                    pension_type:0,
                    pension_bank:0,
                    bank_branch: 0,
                    bank_type:0,
                    payday: null,
                    pension_agency:0,
                    pension: 0
                },
                pensions: []
            }
        }
    }
</script>

<style scoped>
    .input--width{
        min-width: 112px;
    }
</style>
