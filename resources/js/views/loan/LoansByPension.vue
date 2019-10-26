<template>
    <div>
        <h1>Loans By Specific Pension</h1>
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

            }
        }
    }
</script>

<style scoped>

</style>
