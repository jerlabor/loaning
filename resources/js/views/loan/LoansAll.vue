<template>
    <div>
        <h1>All Loans</h1>
        <mdb-datatable
            :data="'/api/loans'"
            :tfoot="false"
            :searching="false"
            :pagination="false"
            class="table-hover table-sm"
        />
    </div>
</template>

<script>
    import { mdbDatatable} from 'mdbvue';
    export default {
        name: "LoansAll"
        ,components: {
            mdbDatatable
        }
    }
</script>

<style scoped>

</style>
