<template>
    <div>
        <div class="card mt-3">
            <div class="card-body">
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
                        <tr v-show="borrower.pensions.length == 0">
                            <td colspan="9" class="text-center">No records found</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PensionIndex"
    }
</script>

<style scoped>

</style>
