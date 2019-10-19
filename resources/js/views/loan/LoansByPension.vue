<template>
    <div>
        <h1>Loans By Specific Pension</h1>
        <mdb-datatable
            :data="'/api/datatable/loans'"
        />
    </div>
</template>

<script>
    import { mdbDatatable } from 'mdbvue';
    export default {
        name: "LoansByPension"
        ,components: {
            mdbDatatable
        },
        date(){

        }
    }
</script>

<style scoped>

</style>
