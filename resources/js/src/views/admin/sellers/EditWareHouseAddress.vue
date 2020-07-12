
<template>
    <div class="main">
        <div v-if="is_details" class="col-md-12">

         <div class="col-md-12">
             <div class="row">
                 <div class="col-md-9 pl-0">
                     <h3 class="pl-3">
                         <i class="feather icon-map"></i> Warehouse Address / Collection Address
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
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Complete Address</p>
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                {{ware_house_address.w_complete_address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pt-1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Street Address</p>
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                {{ware_house_address.w_street_address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 pt-2">
                                        <div class="row">
                                            <div class="col-md-6 col-6 ">
                                                <p>Route</p>
                                            </div>
                                            <div class="col-md-6 col-6 p-0">
                                                {{ware_house_address.w_route}}
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-md-6 col-6 ">
                                                <p>City</p>
                                            </div>
                                            <div class="col-md-6 col-6 p-0">
                                                {{ware_house_address.w_city}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 p-1">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <p>Subrub</p>
                                            </div>
                                            <div class="col-md-6 col-6 p-0">
                                                {{ware_house_address.w_subrub}}
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-md-6 col-6">
                                                <p>Postal Code</p>
                                            </div>
                                            <div class="col-md-6 col-6 p-0">
                                                {{ware_house_address.w_postal_code}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pt-1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Country</p>
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                {{ware_house_address.w_country}}
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
                                <input type="text"  name="w_complete_address" v-model="ware_house_address.w_complete_address"  class="form-control" id="address" placeholder="Enter Complete Address" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="-name">Enter your street</label>
                                <input type="text" name="w_street_address" v-model="ware_house_address.w_street_address"  class="form-control" id="-name" placeholder="Enter your street" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="w_route">Enter your route </label>
                                <input type="text" name="w_route" v-model="ware_house_address.w_route"  class="form-control" id="w_route" placeholder="Enter your route" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="w_city">Enter your city </label>
                                <input type="text" name="w_city" v-model="ware_house_address.w_city"  class="form-control" id="w_city" placeholder="Enter your city" required data-validation-required-message="This  field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label>Enter your subrub </label>
                                <input type="text" name="w_subrub" v-model="ware_house_address.w_subrub"  class="form-control"  placeholder="Enter your subrub" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label for="w">Postal code </label>
                                <input type="text" name="w_postal_code" v-model="ware_house_address.w_postal_code"  class="form-control" id="w" placeholder="Enter Postal Code" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <label>Country </label>
                                <input type="text" name="w_country" v-model="ware_house_address.w_country"  class="form-control"  placeholder="Enter your country" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary">Update Address</button>
                        <button type="button" @click="cancelUpdate" class="btn btn-outline-dark">Cancel Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props : ['ware_house_address'],
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
