<template>
    <div>
        <button class="btn btn-primary btn-sm" @click="$router.go(-1)">Back</button>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Loans By Specific Pension</h5>
                <mdb-datatable
                    :data="`/api/loans?pension_id=${$route.params.pension}`"
                    :tfoot="false"
                    :searching="false"
                    :pagination="false"
                    class="table-hover table-sm"
                />
            </div>
        </div>
    </div>
</template>

<script>
    import { mdbDatatable} from 'mdbvue';
    export default {
        name: "LoansByPension"
        ,components: {
            mdbDatatable
        },
        data(){
            return {

            }
        }
    }
</script>

<style scoped>

</style>
