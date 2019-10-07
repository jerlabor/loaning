<template>
    <div class="flexible-content">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.Navbar-->
        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed">
            <a class="logo-wrapper"><img alt="" class="img-fluid" src="./assets/logo-mdb-vue-small.png"/></a>
            <mdb-list-group class="list-group-flush">
                <router-link to="/dashboard" @click.native="activeItem = 1">
                    <mdb-list-group-item :action="true" :class="activeItem === 1 && 'active'"><mdb-icon icon="chart-pie" class="mr-3"/>Dashboard</mdb-list-group-item>
                </router-link>
                <router-link to="/borrowers" @click.native="activeItem = 2">
                    <mdb-list-group-item :action="true" :class="activeItem === 2 && 'active'"><mdb-icon icon="users" class="mr-3"/>Borrowers</mdb-list-group-item>
                </router-link>
                <router-link to="/tables"  @click.native="activeItem = 3">
                    <mdb-list-group-item :action="true" :class="activeItem === 3 && 'active'"><mdb-icon icon="table" class="mr-3"/>Tables</mdb-list-group-item>
                </router-link>
                <router-link to="/maps" @click.native="activeItem = 4">
                    <mdb-list-group-item :action="true" :class="activeItem === 4 && 'active'"><mdb-icon icon="map" class="mr-3"/>Maps</mdb-list-group-item>
                </router-link>
                <router-link to="/404" @click.native="activeItem = 5">
                    <mdb-list-group-item :action="true" :class="activeItem === 5 && 'active'"><mdb-icon icon="exclamation" class="mr-3"/>404</mdb-list-group-item>
                </router-link>
            </mdb-list-group>
        </div>
        <!-- /Sidebar  -->
        <main>
            <div class="mt-5 p-5 content">
                <router-view></router-view>
            </div>
            <ftr color="primary-color-dark" class="text-center font-small darken-2">
                <p class="footer-copyright mb-0 py-3 text-center">
                    &copy; {{new Date().getFullYear()}} Copyright: <a href="https://mdbootstrap.com/docs/vue/"> MDBootstrap.com </a>
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
        },
        data () {
            return {
                activeItem: 1
            }
        },
        beforeMount () {
            this.activeItem = this.$route.matched[0].props.default.page
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
        padding: 2.5rem;
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
</style>
<style>
    .navbar-light .navbar-brand {
        margin-left: 15px;
        color: #2196f3 !important;
        font-weight: bolder;
    }
</style>
