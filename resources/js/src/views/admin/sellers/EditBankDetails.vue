<template>
    <div class="main">
        <div v-if="is_details" class="col-md-12">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9 pl-0">
                        <h3 class="pl-3">
                            <i class="feather icon-dollar-sign"></i> Bank Details
                        </h3>
                    </div>
                    <div class="col-md-3 text-right">
                        <h3 style="cursor: pointer;" title="Edit Profile">
                            <i @click="editInfo" class="feather text-primary btn-edit-w-address icon-edit"></i>
                        </h3>
                    </div>
                </div>
            </div>

         <div class="col-md-12 border border-primary"></div>
            <div class="col-12 p-0">
                <div class="card">
                    <div class="row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 pt-2">
                                    <h5 class="w-50 pb-1 mb-0">Banking Information</h5>
                                </div>

                                <div class="col-md-12 pt-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <p>Account Holder</p>
                                                </div>
                                                <div class="col-md-7 pl-0">
                                                    {{bankDetails.account_holder}}
                                                </div>
                                                <div class="col-md-5 pt-1 ">
                                                    <p>Account Name</p>
                                                </div>
                                                <div class="col-md-7 pl-0 pt-1">
                                                    {{bankDetails.account_name}}
                                                </div>
                                                <div class="col-md-5 pt-1">
                                                    <p>Bank Name</p>
                                                </div>
                                                <div class="col-md-7 pl-0 pt-1">
                                                    {{bankDetails.bank_name}}
                                                </div>
                                                <div class="col-md-5  pt-1">
                                                    <p>Branch Name</p>
                                                </div>
                                                <div class="col-md-7 pl-0 pt-1">
                                                    {{bankDetails.branch_name}}
                                                </div>

                                                <div class="col-md-5  pt-1">
                                                    <p>Branch Code</p>
                                                </div>
                                                <div class="col-md-7 pl-0 pt-1">
                                                    {{bankDetails.branch_code}}
                                                </div>
                                                <div class="col-md-5  pt-1">
                                                    <p>Bank Address</p>
                                                </div>
                                                <div class="col-md-7 pl-0 pt-1">
                                                    {{bankDetails.bank_address}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="is_edit" class="col-md-12">
            <div class="col-md-12 pl-0">
                <h3> <i class="feather icon-lock"></i> Banking Details </h3>
            </div>
            <div class="col-md-12 border border-primary"></div>
            <div class="card p-1">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account_holder">Account Holder</label>
                                <input type="text" name="account_holder" v-model="bankDetails.account_holder" class="form-control" required placeholder="Account Holder" id="account_holder" >
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Account Name</label>
                                <input type="text" name="account_name" v-model="bankDetails.account_name" class="form-control" required placeholder="Account Name"  data-validation-required-message="This birthdate field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" name="bank_name" class="form-control" v-model="bankDetails.bank_name" required placeholder="Bank Name" id="bank_name" data-validation-required-message="This Bank Name field is required">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label>Branch Name</label>
                                <input type="text" name="branch_name" v-model="bankDetails.branch_name" class="form-control" required placeholder="Branch Name" >
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="branch_code">Branch Code</label>
                                <input type="text" name="branch_code" v-model="bankDetails.branch_code" class="form-control" required placeholder="Branch Code" id="branch_code" data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-birth-date">Bank Address</label>
                                <input type="text" name="bank_address"  v-model="bankDetails.bank_address" class="form-control" required placeholder="Branch Code" id="account-birth-date" data-validation-required-message="This  field is required">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="controls">
                                <label for="doc" class="font-weight-bold w-100">Debit Order Form</label>
                                <small class="pb-1">We required new debit order form with updated banking details</small>
                                <input type="file" value="" name="bank_doc"  class="form-control"  id="doc" data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary">Update</button>
                        <button type="button" @click="cancelUpdate" class="btn btn-dark">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['bankDetails'],
        data () {
            return {
                bankDetails :{
                    account_holder : '',
                    account_name :'',
                    bank_name :'',
                    branch_name :'',
                    branch_code :'',
                    bank_address : '',
                },
                is_edit : false,
                is_details : true
            }
        },
        computed: {
            activeUserInfo () {
                return this.$store.state.AppActiveUser
            }
        },
        methods :{
            editInfo(){
                this.is_edit = true;
                this.is_details = false;
            },
            cancelUpdate(){
                this.is_edit = false;
                this.is_details = true;
            }
        }
    }
</script>
<style type="text/css" scoped>
    p
    {
        margin-top: 0;
        margin-bottom: 0.91rem;
        font-size: 15px;
        font-weight: 500;
    }
</style>
<style type="text/css" scoped>
    p
    {
        margin-top: 0;
        margin-bottom: 0.91rem;
        font-size: 15px;
        font-weight: 500;
    }
</style>
