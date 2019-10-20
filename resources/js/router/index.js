import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './../components/Dashboard'
import BadGateway from './../components/BadGateway'
import ShowBorrower from "../views/borrower/ShowBorrower";
import LoanCreate from "../views/loan/LoanCreate";
import BorrowerCreate from "../views/borrower/BorrowerCreate";
import LoanShow from "../views/loan/LoanShow";
import LoansByPension from "../views/loan/LoansByPension";
import ShowAllBorrowers from "../views/borrower/ShowAllBorrowers"
import LoansAll from "../views/loan/LoansAll";
Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            props: { page: 1 },
            alias: '/'
        },
        {
            path: '/borrower/create',
            name: 'BorrowerCreate',
            props: { page: 2 },
            component: BorrowerCreate
        },
        {
            path: '/borrowers',
            name: 'BorrowerAll',
            props: { page: 35 },
            component: ShowAllBorrowers
        },
        {
            path: '/borrower/:borrower',
            name: 'showBorrower',
            props: { page: 10 },
            component: ShowBorrower
        }
        ,
        {
            path: '/pension/:pension/loans',
            name: 'showLoansByPension',
            props: { page: 10 },
            component: LoansByPension
        },
        {
            path: '/loan/create',
            name: 'loanCreate',
            props: { page: 3 },
            component: LoanCreate
        },
        {
            path: '/loan/:id',
            name: 'loanShow',
            props: { page: 4 },
            component: LoanShow
        },
        {
            path: '/loans',
            name: 'LoansAll',
            props: { page: 34 },
            component: LoansAll
        },
        {
            path: '/404',
            name: 'BadGateway',
            props: { page: 5 },
            component: BadGateway
        },
        {
            path: '*',
            props: { page: 5 },
            redirect: '/404'
        }
    ]
})
