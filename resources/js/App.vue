<template>
    <div class="flexible-content">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#007E33">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            John Edward R. Labor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" @click="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.Navbar-->
        <!-- Sidebar -->
        <div class="sidenav sidebar-fixed position-fixed" >
            <router-link to="/dashboard" class="logo-wrapper"><img alt="" class="img-fluid" src="/svg/madayaw.svg"/></router-link>
            <router-link to="/dashboard">Dashboard</router-link>
            <button class="dropdown-btn">Borrowers
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <router-link :to="{name:'BorrowerAll'}">View Borrowers</router-link>
                <router-link to="/borrower/create">Add Borrower</router-link>
            </div>
            <button class="dropdown-btn">Loans
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <router-link :to="{name:'LoansAll'}">View All Loans</router-link>
                <router-link to="/loan/create">Add Loan</router-link>
            </div>
            <button class="dropdown-btn">Collections
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
        <!-- /Sidebar  -->
        <main>
            <div class="mt-5 p-5 content">
                <router-view></router-view>
            </div>
            <ftr color="success-color-dark" class="text-center font-small darken-2">
                <p class="footer-copyright mb-0 py-3 text-center">
                    &copy; {{new Date().getFullYear()}} Copyright: <a href="https://mdbootstrap.com/docs/vue/"> Madayaw Lending Investors Inc. </a>
                </p>
            </ftr>
        </main>
    </div>
</template>

<script>
    import { mdbDropdownMenu,mdbContainer, mdbNavbar, mdbNavbarBrand, mdbNavItem, mdbNavbarNav, mdbNavbarToggler, mdbBtn, mdbIcon, mdbListGroup, mdbListGroupItem, mdbCardBody, mdbFooter, waves } from 'mdbvue'
    import Dashboard from './components/Dashboard'

    export default {
        name: 'App',
        components: {
            mdbContainer,
            mdbNavbar,
            mdbNavbarBrand,
            mdbNavItem,
            mdbNavbarNav,
            mdbNavbarToggler,
            mdbDropdownMenu,
            mdbBtn,
            mdbListGroup,
            mdbListGroupItem,
            mdbIcon,
            mdbCardBody,
            'ftr': mdbFooter,
            Dashboard,
        }
        ,methods: {
            logout(){
                axios.post('/logout')
                    .then(() => {
                        console.log('tae');
                        window.location.reload();
                    })
            }
        }
        ,
        props: [
            'authUser'
        ],
        data () {
            return {
                activeItem: 1
            }
        },
        created(){
            this.$store.commit('setAuthUser',this.authUser);
        },
        mounted(){
            let dropdown = document.getElementsByClassName("dropdown-btn");
            let i;

            for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("sidebar__nav--active");
                    let dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "block";
                    }
                });
            }
        },
        mixins: [waves]
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    main {
        background-color: #EDEDEE;
    }

    .content {
        min-height: 80vh;
    }

    .flexible-content {
        transition: padding-left 0.3s;
        padding-left: 270px;
    }

    .flexible-navbar {
        transition: padding-left 0.5s;
        padding-left: 270px;
    }

    .sidebar-fixed {
        left: 0;
        top: 0;
        height: 100vh;
        width: 270px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        z-index: 1050;
        background-color: #fff;
        padding: 1.5rem;
        padding-top: 0;
    }

    .sidebar-fixed .logo-wrapper img{
        width: 100%;
        padding-bottom: 2.5rem;
    }

    .sidebar-fixed .list-group-item {
        display: block !important;
        transition: background-color 0.3s;
    }

    .sidebar-fixed .list-group .active {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        border-radius: 5px;
    }

    @media (max-width: 1199.98px) {
        .sidebar-fixed {
            display: none;
        }
        .flexible-content {
            padding-left: 0;
        }
        .flexible-navbar {
            padding-left: 10px;
        }
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
        padding: 10px 8px 10px 16px;
        text-decoration: none;
        font-size: 1rem;
        color: #818181;
        display: block;
        border:none;
        border-bottom: 1px solid #efefef;
        background: none;
        width:100%;
        text-align: left;
        cursor: pointer;
        outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover, .dropdown-btn:hover {
        color: #2196f3;
        background-color: rgba(51, 51, 51, 0.10);
    }

       /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        padding-left: 8px;
    }

    .dropdown-container a {
        font-size: .8rem;
        border:none;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: right;
        padding-right: 8px;
    }
</style>
<style>
    .navbar-light .navbar-brand {
        margin-left: 15px;
        color: #2196f3 !important;
        font-weight: bolder;
    }
</style>
