<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Borrowers</h5>
                <mdb-input ariaDescribedBy="button-addon2" class="mt-0 mb-3 col-4 float-right"
                           placeholder="Search Borrower" v-model="filter">
                    <mdb-btn color="default" group id="button-addon2" size="md" slot="append">Clear</mdb-btn>
                </mdb-input>
                <b-table :fields="fields" :filter="filter" :filter-included-fields="['full_name']" :items="borrowerProvider" :current-page="currentPage"
                         :per-page="perPage" hover
                         small :busy.sync="isBusy" ref="loansTable">
                    <template v-slot:table-busy>
                        <div class="text-center text-success my-2">
                            <b-spinner class="align-middle"></b-spinner>
                            <strong>Loading...</strong>
                        </div>
                    </template>
                    <template v-slot:cell(view)="data">
                        <router-link :to="{ name: 'showBorrower', params: { borrower: data.item.id }}" class="bg-success px-2 py-1 text-white rounded font-weight-bold">Loans</router-link>
                    </template>
                    <template v-slot:cell(action)="data">
                        <router-link :to="{ name: 'loanShow', params: { id: data.item.id }}" class="bg-light p-1 rounded"><i class="fas fa-edit"></i></router-link>
                        <router-link :to="{ name: 'loanShow', params: { id: data.item.id }}" class="bg-light p-1 rounded"><i class="fas fa-user-times"></i></router-link>
                    </template>
                </b-table>
                <b-pagination :per-page="perPage"
                              :total-rows="rows"
                              aria-controls="my-table"
                              v-model="currentPage"
                >
                </b-pagination>

            </div>
        </div>
    </div>
</template>

<script>
    import {mdbBtn,mdbInput} from 'mdbvue'
    export default {
        name: "ShowAllBorrowers",
        methods: {
            borrowerProvider(ctx) {
                console.log(ctx);
                const promise = axios.get(`/api/borrowers?page=${ctx.currentPage}&q=${ctx.filter}&sortBy=${ctx.sortBy}&sortDesc=${ctx.sortDesc}`);

                return promise.then(response => {
                    const items = response.data.data;
                    this.rows = response.data.meta.total;
                    this.perPage = response.data.meta.per_page;
                    return items || [];
                })
                    .catch(e => {
                        return []
                    })
            }
        },
        components: {
            mdbBtn,
            mdbInput
        },
        data() {
            return {
                fields: [
                    {
                        key: 'view',
                    },
                    {
                        key: 'full_name',
                        label: 'Name',
                        sortable: true,
                    },
                    {
                        key: 'contact_num',
                        label: 'Mobile',
                        sortable: true,
                    },
                    {
                        key: 'total_paid',
                        label: 'Total Paid',
                    },
                    {
                        key: 'open_loan_balance',
                    },
                    {
                        key: 'action',
                    },
                ],
                perPage: 0,
                currentPage: 1,
                rows: 0,
                isLoading: true,
                items: [],
                filter: '',
                isBusy: false
            }
        }
    }
</script>

<style scoped>

</style>
