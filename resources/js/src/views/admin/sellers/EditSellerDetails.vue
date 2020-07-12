<template>
    <div class="main">
        <!-- Show Profile Details-->
        <div v-if="is_details" class="show-profile-details col-12">
            <div class="row">
                <div class="col-md-9 pl-0">
                    <h3 class="pl-3">
                        <i class="feather icon-user"></i> Profile Details
                    </h3>
                </div>
                <div class="col-md-3 text-right">
                    <h3 style="cursor: pointer;" title="Edit Profile">
                        <i @click="editInfo" class="feather text-primary btn-edit-profile icon-edit"></i>
                    </h3>
                </div>
            </div>
            <div class="col-md-12 border border-primary"></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6 ">
                                            <p>User Name</p>
                                        </div>
                                        <div class="col-md-6 col-6 p-0">
                                            {{vendor.first_name}} {{vendor.last_name}}
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-md-6 col-6 ">
                                            <p>Mobile Number</p>
                                        </div>
                                        <div class="col-md-6 col-6 p-0">
                                            {{vendor.mobile_num}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Role</p>
                                        </div>
                                        <div class="col-md-6 col-6 p-0">
                                            {{vendor.role}}
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-md-6 col-6">
                                            <p>Phone Number</p>
                                        </div>
                                        <div class="col-md-6 col-6 p-0">
                                            {{vendor.phone_number}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <p>Email</p>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{vendor.email}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 pt-3">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="w-50 pb-1 mb-0">Business Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  pt-1">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-5 col-5 pr-0">
                                            <p>Display Name</p>
                                        </div>
                                        <div class="col-md-7 col-7 pr-0">
                                            {{vendor.display_name}}
                                        </div>

                                        <div class="col-md-5 col-5 pt-1 pr-0 ">
                                            <p>Legal Name</p>
                                        </div>
                                        <div class="col-md-7 col-7 pt-1 pr-0">
                                            {{vendor.legal_name}}
                                        </div>

                                        <div class="col-md-5 col-5 pt-1 pr-0">
                                            <p>Registration Number</p>
                                        </div>
                                        <div class="col-md-7 col-7 pr-0 pt-1">
                                            {{vendor.reg_num}}
                                        </div>
                                        <div class="col-md-5 col-5 pt-1 pr-0">
                                            <p>VAT Number</p>
                                        </div>
                                        <div class="col-md-7 col-7 pt-1 pr-0">
                                            {{vendor.VAT_num}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <h4>Business Description</h4>
                                </div>
                                <div class="col-md-12">
                                    <p>{{vendor.business_description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Details-->
        <form type="post">
            <div v-if="is_edit" class="col-md-12">
                <div class="col-md-12 pl-0">
                    <h3> <i class="feather icon-user"></i> Profile Details </h3>
                </div>
                <div class="col-md-12 border border-primary"></div>
                <div class="card">
                    <div class="row card-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="name">First Name</label>
                                            <input type="text" v-model="vendor.first_name" name="first_name" class="form-control" id="name" placeholder="First Name"  required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" v-model="vendor.last_name" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-name">Role</label>
                                            <select type="text" name="role" v-model="vendor.role"  class="form-control" id="account-name"  required data-validation-required-message="This field is required">
                                                <option>Role</option>
                                                <option>Director</option>
                                                <option>Sale Manager</option>
                                                <option>Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" v-model="vendor.email"  class="form-control" id="email" placeholder="Email"  required data-validation-required-message="This Email field is required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="mobile_num">Telephone Number</label>
                                            <input type="text" name="mobile_num" v-model="vendor.mobile_num" class="form-control" id="mobile_num" placeholder="Telephone Number"  required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Landline Number</label>
                                            <input type="text" name="phone_number" v-model="vendor.phone_number" class="form-control"  placeholder="Landline Number" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4>Business Details</h4>
                                </div>
                                <div class="col-md-6 pt-1">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="display_name" class="font-weight-bold">Shop Display Name</label>
                                            <input type="text" name="display_name" v-model="vendor.display_name" class="form-control" id="display_name" placeholder="Store Display Name"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="legal_name">Business Legal Name</label>
                                            <input type="text" name="legal_name" v-model="vendor.legal_name" class="form-control" id="legal_name" placeholder="Enter Legal Name" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="reg_num">Company Reg Number </label>
                                            <input type="text" name="reg_num" v-model="vendor.reg_num" class="form-control" id="reg_num" placeholder="Enter Company Reg Number" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="VAT_num">VAT Number </label>
                                            <input type="text" name="VAT_num" v-model="vendor.VAT_num" class="form-control" id="VAT_num" placeholder="VAT Number" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="business_description">Business Description </label>
                                    <textarea type="text" v-model="vendor.business_description" name="business_description" class="form-control" id="business_description" placeholder="Business Description" required data-validation-required-message="This field is required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary">Update Profile</button>
                            <button type="button" @click="cancelUpdate" class="btn btn-dark">Cancel Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        props :
            ['vendor'],

        data () {
            return {
                is_edit : false,
                is_details : true,
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
