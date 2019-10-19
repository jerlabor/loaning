<template>
    <div>
        <mdb-datatable
            :data="'/api/datatable/loans'"
            striped
            bordered
            :display="3"
        />
    </div>
</template>

<script>
    import { mdbDatatable } from 'mdbvue';
    export default {
        name: "LoanShow"
        ,components: {
            mdbDatatable
        }
    }
</script>

<style scoped>

</style>
