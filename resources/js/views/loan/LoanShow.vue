<template>
    <div>
        <mdb-modal :show="showRepaymentModal" @close="showRepaymentModal = false">
            <mdb-modal-header class="text-center">
                <mdb-modal-title tag="h4" bold class="w-100">Add Repayment</mdb-modal-title>
            </mdb-modal-header>
            <mdb-modal-body class="mx-3 grey-text">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Php</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Repayment Amount" aria-label="Username" aria-describedby="basic-addon1" v-model="repayment.amount">
                </div>
            </mdb-modal-body>
            <mdb-modal-footer right>
                <button class="btn btn-primary btn-sm" @click.once="addPayment">Submit</button>
            </mdb-modal-footer>
        </mdb-modal>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-3" v-if="!isLoading">
                    <div class="col-md-1">
                        <img src="/images/defaultprof.png" class="img-fluid img-thumbnail" alt="John Edward R. Labor" >
                    </div>
                    <div>
                        <div class="borrower-details">
                            <div class="font-weight-bold">{{loan.pension.borrower.full_name}}</div>
                            <div>Member Since: {{loan.pension.borrower.created_at}}</div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-success btn-sm">Add Loan</button>
                    <button class="btn btn-success btn-sm">View All Loans</button>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Loan#</th>
                            <th scope="col">Released</th>
                            <th scope="col">Maturity</th>
                            <th scope="col">Term</th>
                            <th scope="col">Principal</th>
                            <th scope="col">Due</th>
                            <th scope="col">Paid</th>
                            <th scope="col">Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="!isLoading">
                            <th scope="row">{{loan.id}}</th>
                            <td>{{loan.release_date}}</td>
                            <td>{{loan.maturity_date}}</td>
                            <td>{{loan.term}}</td>
                            <td>{{loan.principal_amount}}</td>
                            <td>{{loan.due}}</td>
                            <td>{{loan.repayment_summary.total_paid}}</td>
                            <td>{{loan.balance}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary btn-sm" @click="showRepaymentModal=true">Add Repayment</button>

                <hr>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Collection Date</th>
                        <th scope="col">Collected By</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="!isLoading" v-for="repayment in loan.repayments">
                        <td>{{repayment.created_at}}</td>
                        <td>{{repayment.collector.name}}</td>
                        <td>{{repayment.amount}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import { mdbDatatable,mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter, mdbModalTitle } from 'mdbvue';
    export default {
        name: "LoanShow"
        ,components: {
            mdbDatatable,mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter, mdbModalTitle
        }
        ,data(){
            return {
                showRepaymentModal: false,
                repayment: {
                    loan_id: this.$route.params.id,
                    amount: null
                },
                loan: null,
                isLoading: true
            }
        },
        methods:{
            addPayment(){
                axios.post('/repayment',this.repayment)
                    .then(response => {

                    })
                    .catch(e => {

                    })
            }
        },
        created() {
            axios.get(`/api/loan/${this.$route.params.id}`)
                .then(response => {
                    this.loan = response.data;
                    this.isLoading = false;
                })
                .catch(e => {

                });
        }
    }
</script>

<style scoped>


</style>
