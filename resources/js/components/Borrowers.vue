<template>
    <section id="borrower">
        <mdb-modal :show="modal" @close="modal = false">
            <mdb-modal-header class="text-center">
                <mdb-modal-title tag="h4" bold class="w-100" style="text-transform:capitalize">{{modalId}}
                </mdb-modal-title>
            </mdb-modal-header>
            <form action="" :id="modalId" @submit.prevent="storePerson">
                <mdb-modal-body class="mx-3 grey-text" v-if="modalId === 'dependent'">
                    <mdb-input label="Name" icon="user" class="mb-5" size="sm" name="dependentName" required/>
                    <div class="form-group row mb-5">
                        <label for="relation" class="col-sm-2 col-form-label">
                            <mdb-icon icon="handshake" style="font-size: 25px"/>
                        </label>
                        <div class="col-sm-10">
                            <select class="custom-select custom-select-lg" id="relation" name="relationToBorrower"
                                    required>
                                <option selected>Relation</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <mdb-input label="Birthday" icon="calendar" type="date" class="mb-5" size="sm" name="birthday"
                               required/>
                </mdb-modal-body>
                <mdb-modal-body class="mx-3 grey-text" v-else>
                    <mdb-input label="Name" icon="user" class="mb-5" size="sm" name="neighbourName" required/>
                </mdb-modal-body>
            </form>
            <mdb-modal-footer center>
                <input class="btn btn-primary" type="submit" value="Create" :form="modalId">
            </mdb-modal-footer>
        </mdb-modal>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="personalInfo-tab" data-toggle="tab" href="#personalInfo" role="tab"
                   aria-controls="personal" aria-selected="true">Personal Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dependents-tab" data-toggle="tab" href="#dependents" role="tab"
                   aria-controls="dependents" aria-selected="false">Dependents/Other Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="miscellaneous-tab" data-toggle="tab" href="#miscellaneous" role="tab"
                   aria-controls="miscellaneous" aria-selected="false">Miscellaneous</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="first_name"
                                           placeholder="Enter First Name" v-model="borrower.first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="middle_name" class="col-sm-2 col-form-label">Middle Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="middle_name"
                                           placeholder="Enter Middle Name" v-model="borrower.middle_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           placeholder="Enter Last Name" v-model="borrower.last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bod" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="bod" v-model="borrower.birthdate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <v-select v-model="borrower.gender" label="label" :options="genderOptions" id="gender"></v-select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referredBy" class="col-sm-2 col-form-label">Referred By</label>
                                <div class="col-sm-10">
                                    <select class="browser-default custom-select" id="referredBy" name="referredBy"
                                            v-model="borrower.referrer">
                                        <option selected>Referred By</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Enter Address" v-model="borrower.address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <div class="spinner-grow spinner-grow-sm" v-if="loading.cities" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <v-select v-model="borrower.city" :options="cityOptions" id="city" label="citymunDesc" v-else></v-select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="barangay" class="col-sm-2 col-form-label">Barangay</label>
                                <div class="col-sm-10">
                                    <select class="browser-default custom-select" id="barangay" name="barangay">
                                        <option selected>Select Barangay</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="province" class="col-sm-2 col-form-label">Province</label>
                                <div class="col-sm-10">
                                    <select class="browser-default custom-select" id="province" name="province">
                                        <option selected>Select Province</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="dependents" role="tabpanel" aria-labelledby="dependents-tab">
                <div class="card">
                    <div class="card-body">
                        <mdb-btn color="primary" size="sm" @click.native="modal = true;modalId = 'dependent'">
                            <mdb-icon icon="plus" class="mr-2"/>
                            Dependents
                        </mdb-btn>
                        <mdb-btn color="primary" size="sm" @click.native="modal = true;modalId = 'neighbour'">
                            <mdb-icon icon="plus" class="mr-2"/>
                            Neighbours
                        </mdb-btn>
                        <mdb-tbl v-if="borrower.dependents.length !== 0" sm bordered class="mt-3">
                            <caption>Dependents</caption>
                            <mdb-tbl-head>
                                <tr>
                                    <th>Name</th>
                                    <th>Relationship</th>
                                    <th>Birthday</th>
                                    <th>Action</th>
                                </tr>
                            </mdb-tbl-head>
                            <mdb-tbl-body>
                                <tr v-for="(dependent,i) in borrower.dependents" :key="i">
                                    <th>{{dependent.name}}</th>
                                    <td>{{dependent.relationship}}</td>
                                    <td>{{dependent.birthday}}</td>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="close text-danger" aria-label="Close"
                                                @click="borrower.dependents.splice(i,1)">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>

                        <mdb-tbl v-if="borrower.neighbours.length !== 0" sm bordered class="nt-3">
                            <caption>Neighbours</caption>
                            <mdb-tbl-head>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </mdb-tbl-head>
                            <mdb-tbl-body>
                                <tr v-for="(neighbour,i) in borrower.neighbours" :key="i">
                                    <th>{{neighbour.name}}</th>
                                    <td class="d-flex justify-content-center">
                                        <button type="button" class="close text-danger" aria-label="Close"
                                                @click="borrower.neighbours.splice(i,1)">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>

                        <form action="" class="mt-5">
                            <div class="form-group row">
                                <label for="otherSOI" class="col-sm-2 col-form-label">Other Source of Income</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="otherSOI" name="otherSOI">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="barangay_cap" class="col-sm-2 col-form-label">Barangay Captain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="barangay_cap" name="barangay_cap"
                                           v-model="borrower.brgyCapt">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="miscellaneous" role="tabpanel" aria-labelledby="miscellaneous-tab">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <label for="ctc_num" class="col-sm-2 col-form-label">CTC Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ctc_num" name="ctc_num">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ctc_date_issued" class="col-sm-2 col-form-label">Date Issued</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="ctc_date_issued" name="ctc_date_issued">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ctc_place_issued" class="col-sm-2 col-form-label">Place Issued</label>
                                <div class="col-sm-10">
                                    <select class="browser-default custom-select" id="ctc_place_issued"
                                            name="ctc_place_issued">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" @click.prevent="storeBorrower">Create</button>
            </div>
        </div>
    </section>
</template>

<script>

    import {
        mdbRow,
        mdbCol,
        mdbCard,
        mdbCardBody,
        mdbView,
        mdbMask,
        mdbCardTitle,
        mdbCardText,
        mdbCardFooter,
        mdbIcon,
        mdbBtn,
        mdbPagination,
        mdbPageNav,
        mdbPageItem,
        mdbTbl,
        mdbTblHead,
        mdbTblBody
    } from 'mdbvue'
    import {
        mdbContainer,
        mdbTextarea,
        mdbModal,
        mdbModalHeader,
        mdbModalTitle,
        mdbModalBody,
        mdbInput,
        mdbModalFooter
    } from 'mdbvue'

    import vSelect from 'vue-select'
    export default {
        name: 'Borrowers',
        components: {
            vSelect,
            mdbRow,
            mdbCol,
            mdbCard,
            mdbCardBody,
            mdbView,
            mdbMask,
            mdbCardTitle,
            mdbCardText,
            mdbCardFooter,
            mdbIcon,
            mdbBtn,
            mdbPagination,
            mdbPageNav,
            mdbPageItem,
            mdbTbl,
            mdbTblHead,
            mdbTblBody,
            mdbContainer,
            mdbModal,
            mdbModalHeader,
            mdbModalBody,
            mdbInput,
            mdbModalFooter,
            mdbTextarea,
            mdbModalTitle
        },
        data() {
            return {
                borrower: {
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    birthdate: '',
                    gender: '',
                    referrer: '',
                    brgyCapt: '',
                    dependents: [],
                    neighbours: []
                },
                modal: false,
                modalId: '',
                genderOptions: [
                    {label: 'Male', value: 'M'},
                    {label: 'Female', value: 'F'}
                ],
                cityOptions: [],
                loading:{
                    cities: true
                }
            }
        },
        created(){
          this.getCities()
        },
        methods: {
            storeBorrower() {
                axios.post('/borrower/store', this.borrower)
                    .then(response => {

                    })
                    .catch(e => {
                        console.log(e);
                    })
            },
            storePerson(e) {
                const form = new FormData(e.target);

                if (e.target.id === 'dependent') {
                    const dependent = {};
                    dependent.name = form.get('dependentName');
                    dependent.relationship = form.get('relationToBorrower');
                    dependent.birthday = form.get('birthday');
                    this.borrower.dependents.push(dependent);
                } else {
                    const neighbour = {};
                    neighbour.name = form.get('neighbourName');
                    this.borrower.neighbours.push(neighbour);
                }
                this.modal = false;
            },
            getCities(){
                axios.get('/api/philippines/city')
                    .then(response => {
                        this.cityOptions = response.data.data;
                    })
                    .catch(e => {
                        console.log(e);
                    })
                    .finally(() => this.loading.cities = false)
            }
        }
    }
</script>

<style scoped>
    .card.card-cascade .view {
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.15), 0 3px 12px 0 rgba(0, 0, 0, 0.15);
    }

    caption {
        text-transform: capitalize;
    }
</style>
