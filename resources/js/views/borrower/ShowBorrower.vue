<template>
    <div>
        <div class="container-fluid" v-if="borrower">
            <div class="card">
                <div class="card-header">
                    Borrower
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img alt="John Edward R. Labor" class="img-fluid img-thumbnail"
                                 src="/images/defaultprof.png">
                        </div>
                        <div class="col-10">
                            <div class="h3">
                                {{borrower.full_name}}
                            </div>
                            <div>
                                {{borrower.birthday}} ({{borrower.age}} y/o)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-columns mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active Loans</h5>
                        <a class="h3">{{borrower.active_loan}}</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Loans</h5>
                        <a class="h3">{{borrower.loans_count}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center" v-else>
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        mdbContainer,
        mdbBtn,
        mdbIcon,
        mdbModal,
        mdbModalHeader,
        mdbModalBody,
        mdbModalFooter,
        mdbInput,
        mdbModalTitle
    } from 'mdbvue';

    export default {
        name: "ShowBorrower",
        components: {
            mdbContainer,
            mdbBtn,
            mdbModal,
            mdbModalHeader,
            mdbModalBody,
            mdbModalFooter,
            mdbInput,
            mdbModalTitle,
            mdbIcon
        },
        created() {
            this.getBorrower();
        },
        methods: {
            getBorrower() {
                axios.get(`/api/borrower/${this.$route.params.borrower}`)
                    .then(response => {
                        this.borrower = response.data;
                    })
                    .catch(e => {
                        alert(e);
                    });
            }
        },
        data() {
            return {
                borrower: null,
            }
        }
    }
</script>


