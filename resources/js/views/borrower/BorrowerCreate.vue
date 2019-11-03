<template>
    <section id="borrower">
        <mdb-modal :show="modal" @close="modal = false">
            <mdb-modal-header class="text-center">
                <mdb-modal-title bold class="w-100" style="text-transform:capitalize" tag="h4">{{modalId}}
                </mdb-modal-title>
            </mdb-modal-header>
            <form :id="modalId" @submit.prevent="storePerson" action="">
                <mdb-modal-body class="mx-3 grey-text" v-if="modalId === 'dependent'">
                    <mdb-input class="mb-5" icon="user" label="Name" name="dependentName" required size="sm"/>
                    <div class="form-group row mb-5">
                        <label class="col-sm-2 col-form-label" for="relation">
                            <mdb-icon icon="handshake" style="font-size: 25px"/>
                        </label>
                        <div class="col-sm-10">
                            <select class="custom-select custom-select-lg" id="relation" name="relationToBorrower"
                                    required>
                                <option :value="JSON.stringify(relation)"
                                        v-for="relation in selectOptions.dependentRelations">
                                    {{relation.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <mdb-input class="mb-5" icon="calendar" label="Birthday" name="birthday" required size="sm"
                               type="date"/>
                </mdb-modal-body>
                <mdb-modal-body class="mx-3 grey-text" v-else>
                    <mdb-input class="mb-5" icon="user" label="Name" name="neighbourName" required size="sm"/>
                </mdb-modal-body>
            </form>
            <mdb-modal-footer center>
                <input :form="modalId" class="btn btn-primary" type="submit" value="Create">
            </mdb-modal-footer>
        </mdb-modal>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a aria-controls="personal" aria-selected="true" class="nav-link active" data-toggle="tab" href="#personalInfo"
                   id="personalInfo-tab" role="tab">Personal Info</a>
            </li>
            <li class="nav-item">
                <a aria-controls="dependents" aria-selected="false" class="nav-link" data-toggle="tab" href="#dependents"
                   id="dependents-tab" role="tab">Dependents/Other Info</a>
            </li>
            <li class="nav-item">
                <a aria-controls="miscellaneous" aria-selected="false" class="nav-link" data-toggle="tab" href="#miscellaneous"
                   id="miscellaneous-tab" role="tab">Miscellaneous</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div aria-labelledby="home-tab" class="tab-pane fade show active" id="personalInfo" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="storeBorrower" id="storeBorrower">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="first_name">First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="first_name" placeholder="Enter First Name"
                                                   required type="mail"
                                                   v-model="borrower.first_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="middle_name">Middle Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="middle_name" placeholder="Enter Middle Name"
                                                   required type="text"
                                                   v-model="borrower.middle_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="last_name">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name"
                                                   required type="text" v-model="borrower.last_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="birthday">Birthday</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="birthday" required
                                                   type="date"
                                                   v-model="borrower.birthday">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" id="gender" required
                                                    v-model="borrower.gender">
                                                <option :value="gender.id" v-for="gender in genderOptions">
                                                    {{gender.label}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="referredBy">Referred By</label>
                                        <div class="col-sm-10">
                                            <div class="spinner-grow spinner-grow-sm" role="status" v-if="isLoading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <v-select
                                                :options="selectOptions.referrers"
                                                :reduce="name => name.id"
                                                id="referredBy"
                                                label="name"
                                                v-else
                                                v-model="borrower.referrer_id"
                                            >
                                                <template #search="{attributes, events}">
                                                    <input
                                                        :required="!borrower.referrer_id"
                                                        class="vs__search"
                                                        v-bind="attributes"
                                                        v-on="events"
                                                    />
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="contact_num">Contact Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="contact_num" required
                                                   type="number" v-model="borrower.contact_num">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="civil_status">Civil Status</label>
                                        <div class="col-sm-10">
                                            <div class="spinner-grow spinner-grow-sm" role="status"
                                                 v-if="isLoading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <select class="custom-select" id="civil_status"
                                                    required v-model="borrower.civil_status">
                                                <option :value="status.id"
                                                        v-for="status in selectOptions.civilStatuses">{{status.name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div v-if="borrower.civil_status != '1' && borrower.civil_status">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="spouse_name">Spouse Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="spouse_name" type="text"
                                                       v-model="spouse.name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="date_married">Date
                                                Married</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="date_married" type="date"
                                                       v-model="spouse.date_married">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="POM">Place of Marriage</label>
                                            <div class="col-sm-10">
                                                <div class="spinner-grow spinner-grow-sm" role="status"
                                                     v-if="isLoading">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                <v-select
                                                    :options="selectOptions.cities"
                                                    :reduce="citymunDesc => citymunDesc.id"
                                                    id="POM"
                                                    label="citymunDesc"
                                                    v-else
                                                    v-model="spouse.POM"
                                                ></v-select>
                                            </div>
                                        </div>
                                        <div v-if="borrower.civil_status == 3 || borrower.civil_status == 4">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="COD">Cause of Death</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="COD" type="text"
                                                           v-model="spouse.COD">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="date_died">Date Died</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="date_died" type="date"
                                                           v-model="spouse.date_died">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Address</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="address">Street</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="address" name="address" placeholder="Enter Address"
                                                   required type="text" v-model="borrower.street">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="city">City</label>
                                        <div class="col-sm-10">
                                            <div class="spinner-grow spinner-grow-sm" role="status"
                                                 v-if="isLoading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <v-select
                                                :options="selectOptions.cities"
                                                :reduce="citymunDesc => citymunDesc.id"
                                                id="city"
                                                label="citymunDesc"
                                                v-else
                                                v-model="borrower.city"
                                            >
                                                <template #search="{attributes, events}">
                                                    <input
                                                        :required="!borrower.city"
                                                        class="vs__search"
                                                        v-bind="attributes"
                                                        v-on="events"
                                                    />
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="barangay">Barangay</label>
                                        <div class="col-sm-10">
                                            <div class="spinner-grow spinner-grow-sm" role="status"
                                                 v-if="isLoading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <v-select
                                                :options="selectOptions.barangays"
                                                :reduce="brgyDesc => brgyDesc.id"
                                                id="barangay"
                                                label="brgyDesc"
                                                v-else
                                                v-model="borrower.barangay"
                                            >
                                                <template #search="{attributes, events}">
                                                    <input
                                                        :required="!borrower.barangay"
                                                        class="vs__search"
                                                        v-bind="attributes"
                                                        v-on="events"
                                                    />
                                                </template>
                                            </v-select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="province">Province</label>
                                        <div class="col-sm-10">
                                            <div class="spinner-grow spinner-grow-sm" role="status"
                                                 v-if="isLoading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <v-select
                                                :options="selectOptions.provinces"
                                                :reduce="provDesc => provDesc.id"
                                                id="province"
                                                label="provDesc"
                                                v-else

                                                v-model="borrower.province"
                                            >
                                                <template #search="{attributes, events}">
                                                    <input
                                                        :required="!borrower.province"
                                                        class="vs__search"
                                                        v-bind="attributes"
                                                        v-on="events"
                                                    />
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <div aria-labelledby="dependents-tab" class="tab-pane fade" id="dependents" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <mdb-btn @click.native="modal = true;modalId = 'dependent'" color="primary" size="sm">
                            <mdb-icon class="mr-2" icon="plus"/>
                            Dependents
                        </mdb-btn>
                        <mdb-btn @click.native="modal = true;modalId = 'neighbour'" color="primary" size="sm">
                            <mdb-icon class="mr-2" icon="plus"/>
                            Neighbours
                        </mdb-btn>
                        <mdb-tbl bordered class="mt-3" sm v-if="borrower.dependents.length !== 0">
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
                                <tr :key="i" v-for="(dependent,i) in borrower.dependents">
                                    <th>{{dependent.name}}</th>
                                    <td>{{dependent.relationship.name}}</td>
                                    <td>{{dependent.birthday}}</td>
                                    <td class="d-flex justify-content-center">
                                        <button @click="borrower.dependents.splice(i,1)" aria-label="Close" class="close text-danger"
                                                type="button">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>

                        <mdb-tbl bordered class="nt-3" sm v-if="borrower.neighbours.length !== 0">
                            <caption>Neighbours</caption>
                            <mdb-tbl-head>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </mdb-tbl-head>
                            <mdb-tbl-body>
                                <tr :key="i" v-for="(neighbour,i) in borrower.neighbours">
                                    <th>{{neighbour.name}}</th>
                                    <td class="d-flex justify-content-center">
                                        <button @click="borrower.neighbours.splice(i,1)" aria-label="Close" class="close text-danger"
                                                type="button">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>

                        <form action="" class="mt-5">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="otherSOI">Other Source of Income</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="otherSOI" name="otherSOI" type="text"
                                           v-model="borrower.otherSOI">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="barangay_cap">Barangay Captain</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="barangay_cap" name="barangay_cap" type="text"
                                           v-model="borrower.barangay_captain">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div aria-labelledby="miscellaneous-tab" class="tab-pane fade" id="miscellaneous" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="ctc_num">CTC Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="ctc_num" name="ctc_num" type="text"
                                           v-model="ctc.ctc_num">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="ctc_date_issued">Date Issued</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="ctc_date_issued" name="ctc_date_issued" type="date"
                                           v-model="ctc.ctc_date_issued">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="ctc_city_issued">City</label>
                                <div class="col-sm-10">
                                    <div class="spinner-grow spinner-grow-sm" role="status" v-if="isLoading">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <v-select
                                        :options="selectOptions.cities"
                                        :reduce="citymunDesc => citymunDesc.id"
                                        id="ctc_city_issued"
                                        label="citymunDesc"
                                        v-else
                                        v-model="ctc.ctc_city_issued"
                                    >

                                    </v-select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-sm-10">
                <button class="btn btn-primary" form="storeBorrower" type="submit" :disabled="isProcessing">{{submitText}}</button>
            </div>
        </div>
    </section>
</template>

<script>

    import {
        mdbBtn,
        mdbCard,
        mdbCardBody,
        mdbCardFooter,
        mdbCardText,
        mdbCardTitle,
        mdbCol,
        mdbContainer,
        mdbIcon,
        mdbInput,
        mdbMask,
        mdbModal,
        mdbModalBody,
        mdbModalFooter,
        mdbModalHeader,
        mdbModalTitle,
        mdbPageItem,
        mdbPageNav,
        mdbPagination,
        mdbRow,
        mdbTbl,
        mdbTblBody,
        mdbTblHead,
        mdbTextarea,
        mdbView
    } from 'mdbvue'

    export default {
        name: 'BorrowerCreate',
        components: {
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
                    first_name: null,
                    middle_name: null,
                    last_name: null,
                    birthday: null,
                    gender: null,
                    referrer_id: null,
                    barangay_captain: null,
                    dependents: [],
                    neighbours: [],
                    street: null,
                    city: null,
                    barangay: null,
                    province: null,
                    otherSOI: null,
                    contact_num: null,
                    civil_status: null
                },
                spouse: {
                    name: null,
                    date_married: null,
                    POM: null,
                    COD: null,
                    date_died: null
                },
                ctc: {
                    ctc_num: null,
                    ctc_date_issued: null,
                    ctc_city_issued: null,
                },
                modal: false,
                modalId: '',
                genderOptions: [
                    {label: 'Male', id: 'M'},
                    {label: 'Female', id: 'F'}
                ],
                selectOptions: {
                    cities: [],
                    barangays: [],
                    provinces: [],
                    referrers: [],
                    dependentRelations: [],
                    civilStatuses: []
                },
                isLoading: true,
                isProcessing: true,
            }
        },
        computed: {
          submitText(){
              return this.isProcessing ? 'Loading...' : 'Submit'
          }
        },
        created() {
            this.getSelectOptions();
        },
        methods: {
            getApi(endpoint) {
                return axios.get(endpoint);
            },
            getSelectOptions() {
                let CreateBorrowerComponent = this;
                axios.all([
                    this.getApi('/api/philippines/cities'),
                    this.getApi('/api/philippines/provinces'),
                    this.getApi('/api/philippines/barangays'),
                    this.getApi('/api/referrers'),
                    this.getApi('/api/dependent/relations'),
                    this.getApi('/api/civil-status'),
                ])
                    .then(axios.spread(function (cities, provinces, barangays, referrers, relations, civilStatus) {
                        // Both requests are now complete
                        CreateBorrowerComponent.selectOptions.cities = cities.data.data;
                        CreateBorrowerComponent.selectOptions.provinces = provinces.data.data;
                        CreateBorrowerComponent.selectOptions.barangays = barangays.data.data;
                        CreateBorrowerComponent.selectOptions.referrers = referrers.data;
                        CreateBorrowerComponent.selectOptions.dependentRelations = relations.data;
                        CreateBorrowerComponent.selectOptions.civilStatuses = civilStatus.data;

                    }))
                    .finally(() => {
                        this.isLoading = false;
                        this.isProcessing = false;
                    });
            },
            storeBorrower(e) {
                this.isProcessing = true;

                const data = {...this.borrower};

                if (data.civil_status !== 1) {
                    data['spouse'] = this.spouse;
                }

                if (this.ctc.ctc_num) {
                    data['ctc'] = this.ctc;
                }

                axios.post('/borrower', data)
                    .then(response => {
                        this.$router.push(`/borrower/${response.data.borrower_id}`)
                    })
                    .catch(e => {
                        let error_message;
                        error_message = '';

                        error_message += e.response.data.message;

                        for (let error in e.response.data.errors) {
                            error_message += e.response.data.errors[error];
                        }

                        alert(error_message);
                    })
                    .finally(() => this.isProcessing = false)

            },
            storePerson(e) {
                const form = new FormData(e.target);

                if (e.target.id === 'dependent') {
                    const dependent = {};
                    dependent.name = form.get('dependentName');
                    dependent.relationship = JSON.parse(form.get('relationToBorrower'));
                    dependent.birthday = form.get('birthday');
                    this.borrower.dependents.push(dependent);
                } else {
                    const neighbour = {};
                    neighbour.name = form.get('neighbourName');
                    this.borrower.neighbours.push(neighbour);
                }
                this.modal = false;
            }
        }
    }
</script>

