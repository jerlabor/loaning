<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add Loan
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Borrower</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pension Code</label>
                                <div class="col-sm-10">
                                    <select class="custom-select">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Current Pension</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                <hr>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Loan Type</label>
                        <div class="col-sm-10">
                            <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Principal Amount</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
                        <div class="col-sm-10">
                            <select class="custom-select">
                                <option v-for="n in 12">{{n}}</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoanCreate"
    }
</script>

<style scoped>

</style>
