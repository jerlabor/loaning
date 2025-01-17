<template>
    <div>
        <button class="btn btn-danger btn-sm" @click="$router.go(-1)">Back</button>
        <router-link :to="{name: 'loanCreate',query: {pension: $route.params.pension}}" class="btn btn-primary btn-sm">Add Loan</router-link>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Loans By Specific Pension</h5>
                <div class="table-responsive">
                    <b-table :fields="fields" :filter="filter" :filter-included-fields="['id']" :items="items" :no-provider-paging="true" hover
                             small :busy.sync="isBusy" show-empty empty-text="No loans found under this pension.">
                        <template v-slot:table-busy>
                            <div class="text-center text-danger my-2">
                                <b-spinner class="align-middle"></b-spinner>
                                <strong>Loading...</strong>
                            </div>
                        </template>
                        <template v-slot:cell(balance)="data">
                            {{ (data.item.principal_amount * data.item.term) - data.item.repayment_summary.total_paid}}
                        </template>
                        <template v-slot:cell(due)="data">
                            {{ data.item.principal_amount * data.item.term }}
                        </template>
                        <template v-slot:cell(view)="data">
                            <router-link :to="{ name: 'loanShow', params: { id: data.item.id }}"><i class="far fa-eye"></i></router-link>
                        </template>
                    </b-table>
                    <b-pagination :per-page="perPage"
                                  :total-rows="rows"
                                  aria-controls="my-table"
                                  v-if="!isLoading"
                                  v-model="currentPage"
                    >
                    </b-pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoansByPension",
        methods: {
            loansProvider(currentPage = 1) {
                const promise = axios.get(`/api/loans?pension_id=${this.$route.params.pension}&page=${currentPage}`);

                return promise.then(response => {
                    const items = response.data.data;
                    this.currentPage = response.data.meta.current_page;
                    this.perPage = response.data.meta.per_page;
                    this.rows = response.data.meta.total;
                    this.isLoading = false;
                    this.items = items || [];
                })
                    .catch(e => {
                        return []
                    })
            }
        },
        watch: {
            currentPage() {
                this.loansProvider(this.currentPage);
            }
        },
        created() {
            this.loansProvider();
        },
        data() {
            return {
                fields: [
                    {
                        key: 'release_date',
                        label: 'Released',
                        sortable: true,
                    },
                    {
                        key: 'pension.borrower.full_name',
                        label: 'Name',
                        sortable: true,
                    },
                    {
                        key: 'id',
                        label: 'Loan#',
                        sortable: true,
                    },
                    {
                        key: 'principal_amount',
                        label: 'Principal',
                        sortable: true,
                    },
                    {
                        key: 'due',
                        sortable: true,
                    },
                    {
                        key: 'repayment_summary.total_paid',
                        label: 'Paid',
                        sortable: true,
                    },
                    {
                        key: 'balance',
                        sortable: true,
                    },
                    {
                        key: 'repayment_summary.last_payment',
                        label: 'Last Payment'
                    },
                    'View'
                ],
                perPage: 0,
                currentPage: 0,
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
