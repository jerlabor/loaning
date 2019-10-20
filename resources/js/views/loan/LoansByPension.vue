<template>
    <div>
        <h1>Loans By Specific Pension</h1>
        <mdb-modal :show="showRepaymentModal" @close="showRepaymentModal = false">
            <mdb-modal-header class="text-center">
                <h1>Repayment</h1>
            </mdb-modal-header>
            <mdb-modal-body class="mx-3 grey-text">
                <form action="">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Php</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Repayment Amount" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
            </mdb-modal-body>
            <mdb-modal-footer center>
                <button @click="showRepaymentModal = false">Login</button>
            </mdb-modal-footer>
        </mdb-modal>
        <mdb-datatable
            :data="'/api/datatable/pension/'+this.$route.params.pension+'/loans'"
            :tfoot="false"
            :searching="false"
            :pagination="false"
            class="table-hover table-sm"
        />
    </div>
</template>

<script>
    import { mdbDatatable ,mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter} from 'mdbvue';
    export default {
        name: "LoansByPension"
        ,components: {
            mdbDatatable,mdbModal, mdbModalHeader, mdbModalBody, mdbModalFooter
        },
        data(){
            return {
                showRepaymentModal: false
            }
        }
    }
</script>

<style scoped>

</style>
