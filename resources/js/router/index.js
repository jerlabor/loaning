import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './../components/Dashboard'
import Borrowers from './../components/Borrowers'
import Tables from './../components/Tables'
import Maps from './../components/Maps'
import BadGateway from './../components/BadGateway'
import ShowBorrower from "../views/borrower/ShowBorrower";
import LoanCreate from "../views/loan/LoanCreate";

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
            path: '/borrowers',
            name: 'Borrowers',
            props: { page: 2 },
            component: Borrowers
        },
        {
            path: '/borrower/:borrower',
            name: 'showBorrower',
            props: { page: 10 },
            component: ShowBorrower
        },
        {
            path: '/:pension/loan/create',
            name: 'loanCreate',
            props: { page: 3 },
            component: LoanCreate
        },
        {
            path: '/maps',
            name: 'Maps',
            props: { page: 4 },
            component: Maps
        },
        {
            path: '/404',
            name: 'BadGateway',
            props: { page: 5 },
            component: BadGateway
        },
        // {
        //     path: '*',
        //     props: { page: 5 },
        //     redirect: '/404'
        // }
    ]
})
