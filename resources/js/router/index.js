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
import LoanByBorrower from "../views/loan/LoanByBorrower";
import pension from "./pension";
import print from "./print";
Vue.use(Router);

const baseRoutes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        meta: {
            requiresAuth: true
        },
        component: Dashboard,
        alias: '/'
    },
    ...pension,
    {
        path: '/borrower/create',
        name: 'BorrowerCreate',
        meta: {
            requiresAuth: true
        },
        component: BorrowerCreate
    },
    {
        path: '/borrowers',
        name: 'BorrowerAll',
        meta: {
            requiresAuth: true
        },
        component: ShowAllBorrowers
    },
    {
        path: '/borrower/:borrower',
        name: 'showBorrower',
        meta: {
            requiresAuth: true
        },
        component: ShowBorrower
    },
    {
        path: '/borrower/:borrower/loans',
        name: 'loansByBorrower',
        meta: {
            requiresAuth: true
        },
        props: { page: 232 },
        component: LoanByBorrower
    }
    ,
    {
        path: '/pension/:pension/loans',
        name: 'showLoansByPension',
        meta: {
            requiresAuth: true
        },
        component: LoansByPension
    },
    {
        path: '/loan/create',
        name: 'loanCreate',
        meta: {
            requiresAuth: true
        },
        component: LoanCreate
    },
    {
        path: '/loan/:id',
        name: 'loanShow',
        meta: {
            requiresAuth: true
        },
        component: LoanShow
    },
    {
        path: '/loans',
        name: 'LoansAll',
        meta: {
            requiresAuth: true
        },
        component: LoansAll
    },
    {
        path: '/404',
        name: 'BadGateway',
        component: BadGateway
    },
    // {
    //     path: '*',
    //     redirect: '/404'
    // }
];

const routes = baseRoutes.concat(pension,print);
export const router =  new Router({
    mode: 'history',
    routes
});


