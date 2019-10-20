<template>
    <div>
        <h1>All Borrowers</h1>
            <mdb-datatable
                :data="'/api/borrowers'"
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
        name: "ShowAllBorrowers"
        ,components: {
            mdbDatatable
        }
    }
</script>

<style scoped>

</style>
