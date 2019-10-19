import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './../components/Dashboard'
import BadGateway from './../components/BadGateway'
import ShowBorrower from "../views/borrower/ShowBorrower";
import LoanCreate from "../views/loan/LoanCreate";
import BorrowerCreate from "../views/borrower/BorrowerCreate";
import LoanShow from "../views/loan/LoanShow";
import LoansByPension from "../views/loan/LoansByPension";

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
            path: '/borrower/:borrower',
            name: 'showBorrower',
            props: { page: 10 },
            component: ShowBorrower
        }
        ,
        {
            path: '/pension/:pension/loans',
            name: 'showBorrower',
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
