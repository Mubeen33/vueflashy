
<template>
    <div class="main">

        <div class="col-md-12">
            <div class="col-md-12 pl-0">
                <h3> <i class="feather icon-settings"></i> Activities </h3>
            </div>
            <div class="col-md-12 p-0 border border-primary"></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">

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
        </div>
    </div>
</template>

<script>
    export default {
        props : ['vendor'],
        data () {
            return {
                ware_house_address :{
                    w_complete_address : '',
                    w_street_address : '',
                    w_route : '',
                    w_city : '',
                    w_subrub : '',
                    w_postal_code : '',
                    w_country : '',
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
