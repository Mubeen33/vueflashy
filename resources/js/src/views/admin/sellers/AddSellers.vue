<template>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper pr-2 pl-2">
            <div class="content-body pt-1">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">

<!--                        success alert-->
                        <div class="col-md-12" v-if="success_alert">
                            <div class="alert border border-success text-success alert-dismissible fade show bg-white" role="alert">
                                <strong>Success ... ! </strong>  {{successMsg}}
                                <button type="button" class="close" @click="hideAlert" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <form @submit.prevent="storeSeller" method="post" enctype="multipart/form-data" id="vendor-form">
                                <div class="row">
<!--                                    Profile Details-->
                                    <div class="col-md-6">
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
                                                                    <input type="text" v-model="formData.first_name" name="first_name" class="form-control" id="name" placeholder="First Name"  required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="last_name">Last Name</label>
                                                                    <input type="text" v-model="formData.last_name" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Role</label>
                                                                    <select type="text" name="role" v-model="formData.role"  class="form-control" id="account-name"  required data-validation-required-message="This field is required">
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
                                                                    <input type="email" name="email" v-model="formData.email"  class="form-control" id="email" placeholder="Email"  required data-validation-required-message="This Email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="mobile_num">Telephone Number</label>
                                                                    <input type="text" name="mobile_num" v-model="formData.mobile_num" class="form-control" id="mobile_num" placeholder="Telephone Number"  required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>Landline Number</label>
                                                                    <input type="text" name="phone_number" v-model="formData.phone_number" class="form-control"  placeholder="Landline Number" required >
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <h4>Business Details</h4>
                                                        </div>
                                                        <div class="col-12 pt-1">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="display_name" class="font-weight-bold">Shop Display Name</label>
                                                                    <input type="text" name="display_name" v-model="formData.display_name" class="form-control" id="display_name" placeholder="Store Display Name"  required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="legal_name">Business Legal Name</label>
                                                                    <input type="text" name="legal_name" v-model="formData.legal_name" class="form-control" id="legal_name" placeholder="Enter Legal Name" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="reg_num">Company Reg Number </label>
                                                                    <input type="text" name="reg_num" v-model="formData.reg_num" class="form-control" id="reg_num" placeholder="Enter Company Reg Number" required >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="VAT_num">VAT Number </label>
                                                                    <input type="text" name="VAT_num" v-model="formData.VAT_num" class="form-control" id="VAT_num" placeholder="VAT Number" required data-validation-required-message="This field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="business_description">Business Description </label>
                                                            <textarea type="text" v-model="formData.business_description" name="business_description" class="form-control" id="business_description" placeholder="Business Description" required data-validation-required-message="This field is required"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    Banking Details-->
                                    <div class="col-md-6">
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
                                                            <input type="text" name="account_holder" v-model="formData.account_holder" class="form-control" required placeholder="Account Holder" id="account_holder" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Account Name</label>
                                                            <input type="text" name="account_name" v-model="formData.account_name" class="form-control" required placeholder="Account Name"  data-validation-required-message="This birthdate field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="bank_name">Bank Name</label>
                                                            <input type="text" name="bank_name" class="form-control" v-model="formData.bank_name" required placeholder="Bank Name" id="bank_name" data-validation-required-message="This Bank Name field is required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Branch Name</label>
                                                            <input type="text" name="branch_name" v-model="formData.branch_name" class="form-control" required placeholder="Branch Name" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="branch_code">Branch Code</label>
                                                            <input type="text" name="branch_code" v-model="formData.branch_code" class="form-control" required placeholder="Branch Code" id="branch_code" data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-birth-date">Bank Address</label>
                                                            <input type="text" name="bank_address"  v-model="formData.bank_address" class="form-control" required placeholder="Branch Code" id="account-birth-date" data-validation-required-message="This  field is required">
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
                                            </div>
                                        </div>
                                    </div>
<!--                                         Address Details-->
                                    <div class="col-md-6">
                                        <div class="col-md-12 pl-0">
                                            <h3> <i class="feather icon-map"></i> Business Address </h3>
                                        </div>
                                        <div class="col-md-12 border border-primary"></div>
                                        <div class="card">
                                            <div class="row card-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="business_address">Enter Complete Address</label>
                                                            <input type="text" name="b_complete_address" v-model="formData.b_complete_address" class="form-control" id="business_address" placeholder="Enter Complete Address" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">Enter your street</label>
                                                            <input type="text" name="b_street_address" v-model="formData.b_street_address"  class="form-control"  placeholder="Enter your street" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="b_route">Enter your route </label>
                                                            <input type="text" name="b_route" v-model="formData.b_route" value="" class="form-control" id="b_route" placeholder="Enter your route" required >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="b_city">Enter your city </label>
                                                            <input type="text" name="b_city" v-model="formData.b_city" class="form-control" id="b_city" placeholder="Enter your city" required data-validation-required-message="This  field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Enter your subrub </label>
                                                            <input type="text" name="b_subrub" v-model="formData.b_subrub"  class="form-control"  placeholder="Enter your subrub" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="b">Postal code </label>
                                                            <input type="text" name="b_postal_code" v-model="formData.b_postal_code" value="" class="form-control" id="b" placeholder="Enter Postal Code" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="b_country">Country </label>
                                                            <input type="text" name="b_country" v-model="formData.b_country" class="form-control" id="b_country" placeholder="Enter your country" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
<!--                                          Address Details-->
                                    <div class="col-md-6">
                                        <div class="col-md-12 pl-0">
                                            <h3> <i class="feather icon-map-pin"></i> Warehouse / Collection Address </h3>
                                        </div>
                                        <div class="col-md-12 border border-primary"></div>
                                        <div class="card">
                                            <div class="row card-body">
                                                <div class="col-md-12">
                                                    <small  class="float-right text-primary copy-in-warehouse" title="Copy From Business Address" style="cursor: pointer;">
                                                        copy
                                                    </small>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="address">Enter Complete Address</label>
                                                            <input type="text"  name="w_complete_address" v-model="formData.w_complete_address"  class="form-control" id="address" placeholder="Enter Complete Address" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="-name">Enter your street</label>
                                                            <input type="text" name="w_street_address" v-model="formData.w_street_address"  class="form-control" id="-name" placeholder="Enter your street" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="w_route">Enter your route </label>
                                                            <input type="text" name="w_route" v-model="formData.w_route"  class="form-control" id="w_route" placeholder="Enter your route" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="w_city">Enter your city </label>
                                                            <input type="text" name="w_city" v-model="formData.w_city"  class="form-control" id="w_city" placeholder="Enter your city" required data-validation-required-message="This  field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Enter your subrub </label>
                                                            <input type="text" name="w_subrub" v-model="formData.w_subrub"  class="form-control"  placeholder="Enter your subrub" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="w">Postal code </label>
                                                            <input type="text" name="w_postal_code" v-model="formData.w_postal_code"  class="form-control" id="w" placeholder="Enter Postal Code" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Country </label>
                                                            <input type="text" name="w_country" v-model="formData.w_country"  class="form-control"  placeholder="Enter your country" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!--                                          Billing Address -->
                                    <div class="col-md-6">
                                        <div class="col-md-12 pl-0">
                                            <h3> <i class="feather icon-map-pin"></i> Billing Address </h3>
                                        </div>
                                        <div class="col-md-12 border border-primary"></div>
                                        <div class="card">
                                            <div class="row card-body">
                                                <div class="col-md-12">
                                                    <small @click="copyForWareHouseAddress" class="float-right text-primary copy-in-billing" title="Copy From Business Address" style="cursor: pointer;">
                                                        copy
                                                    </small>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing_address">Enter Complete Billing Address</label>
                                                            <input type="text" name="billing_complete_address" v-model="formData.billing_complete_address"  class="form-control" id="billing_address" placeholder="Enter Complete Address" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing-name">Enter your street</label>
                                                            <input type="text" name="billing_street_address" v-model="formData.billing_street_address"  class="form-control" id="billing-name" placeholder="Enter your street" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing_route">Enter your route </label>
                                                            <input type="text" name="billing_route" v-model="formData.billing_route"  class="form-control" id="billing_route" placeholder="Enter your route" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing_city">Enter your city </label>
                                                            <input type="text" name="billing_city" v-model="formData.billing_city"  class="form-control" id="billing_city" placeholder="Enter your city" required data-validation-required-message="This  field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Enter your subrub </label>
                                                            <input type="text" name="billing_subrub" v-model="formData.billing_subrub" class="form-control"  placeholder="Enter your subrub" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing">Postal code </label>
                                                            <input type="text" name="billing_postal_code" v-model="formData.billing_postal_code"  class="form-control" id="billing" placeholder="Enter Postal Code" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Country </label>
                                                            <input type="text" name="billing_country" v-model="formData.billing_country"  class="form-control"  placeholder="Enter your country" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
<!--                                          Settings -->
                                    <div class="col-md-6 pl-3">
                                        <div class="col-md-12 pl-0">
                                            <h3> <i class="feather icon-settings"></i> Activities </h3>
                                        </div>
                                        <div class="col-md-12 p-0 border border-primary"></div>

                                        <div class="row card-body border pl-1">

                                            <h6 class="m-1">Product Type</h6>
                                            <div class="col-12 mb-3">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" v-model="formData.is_physical" name="physical_products"  class="custom-control-input" checked id="accountSwitch25">
                                                    <label class="custom-control-label mr-1" for="accountSwitch25"></label>
                                                    <span class="switch-label w-100">
                                                 <strong>Physical</strong>     ( <small>A tangible product that you will ship to buyers</small> )
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" name="digital_products" v-model="formData.is_digital" class="custom-control-input" id="accountSwitch22">
                                                    <label class="custom-control-label mr-1" for="accountSwitch22"></label>
                                                    <span class="switch-label w-100 font-weight-bold">
                                                 <strong>  Digital </strong>  ( <small>A digital file that bayer will download</small> )
                                                </span>
                                                </div>
                                            </div>

                                            <h6 class="m-1">Listing Type</h6>
                                            <div class="col-12 mb-3">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input name="product_for_sale" v-model="formData.products_for_sale" type="checkbox" class="custom-control-input" checked id="accountSwitch44">
                                                    <label class="custom-control-label mr-1" for="accountSwitch44"></label>
                                                    <div class="w-100">
                                                        <strong class="switch-label w-100">
                                                            Add Product for Sale
                                                        </strong>
                                                        <br>  <small class="w-100 pl-1">Add a product to sell on site ( commirion can be taken )</small>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input name="add_priceless_products" v-model="formData.for_price"  type="checkbox" class="custom-control-input" id="accountSwitch444">
                                                    <label class="custom-control-label mr-1" for="accountSwitch444"></label>
                                                    <div class="w-100">
                                                        <strong class="switch-label w-100">
                                                            Add a Product to Receive Quote ( Price ) Requests
                                                        </strong>
                                                        <br>
                                                        <small class="w-100 pl-1">
                                                            Add a product without price to get price requests from customers
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input name="add_ordinary_products" v-model="formData.for_listing" type="checkbox" class="custom-control-input"  id="accountSwitch34">
                                                    <label class="custom-control-label mr-1" for="accountSwitch34"></label>
                                                    <div class="w-100">
                                                        <strong class="switch-label w-100">
                                                            Add a Product or Services as a Ordinary Listing
                                                        </strong>
                                                        <br>
                                                        <small class="w-100 pl-1">
                                                            Add a product without or service without buy option
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 d-flex pt-4 flex-sm-row flex-column justify-content-end">
                                                <button type="submit" @click="checkData" class="btn btn-dark mr-sm-1 mb-1 mb-sm-0">Save changes</button>
                                                <button type="reset" class="btn btn-outline-danger" title="Reset Form empty all from fields">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
</template>
<script>
    import axios from "../../../axios";
    export default {
        mounted() {

        },

        data(){
           return  {
               successMsg:'',
               loading : false,
               success_alert: false,
                formData : {
                    first_name : '',
                    last_name :'',
                    mobile_num :'',
                    phone_number :'',
                    display_name :'',
                    legal_name :'',
                    reg_num :'',
                    VAT_num :'',
                    business_description :'',
                    email :'',
                    role :'',

                    account_holder : '',
                    account_name :'',
                    bank_name :'',
                    branch_name :'',
                    branch_code :'',
                    bank_address : '',


                    b_complete_address:  '',
                    b_street_address: '',
                    b_route : '',
                    b_city :  '',
                    b_subrub : '',
                    b_postal_code : '',
                    b_country : '',

                    w_complete_address : '',
                    w_street_address : '',
                    w_route : '',
                    w_city : '',
                    w_subrub : '',
                    w_postal_code : '',
                    w_country : '',

                    billing_complete_address : '',
                    billing_street_address : '',
                    billing_route : '',
                    billing_city : '',
                    billing_subrub : '',
                    billing_postal_code : '',
                    billing_country: '',

                    is_physical : true,
                    is_digital : false,
                    products_for_sale : true,
                    for_price : false,
                    for_listing : false,
                },
               listPosition: [
                   'top-right',
                   'top-left',
                   'top-center',
                   'bottom-right',
                   'bottom-left']
           }
        },
        methods : {
            checkData(){
            },
            storeSeller(){
                axios.post(this.$baseApiDomain+'/api/admin/store-vendor',this.formData)
                    .then(response => {
                            this.resetForm();
                            this.success_alert = true;
                            this.successMsg = response.data;

                        $vs.notify({
                            title:'Position top-right',
                            text:response.data,
                            color:'success',
                            position:'top-right'}
                           )
                    })
                    .catch(error => {
                        console.log(error.status)
                        this.errored = true
                    })
                    .finally(() => {
                        this.loading = false
                    });
            },


            copyForWareHouseAddress() {
            //copy address perform later
            },
            resetForm(){
                document.getElementById("vendor-form").reset();
            },
            hideAlert(){
                this.success_alert = false;
            }

        }
    }

</script>
<style scoped>
    .form-group{
        margin-bottom: 0.85rem !important;
    }
</style>
