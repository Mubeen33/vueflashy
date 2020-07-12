<template>
    <div class="main">

        <edit-business-address :address="address"/>

        <edit-ware-house-address :ware_house_address="address" />

        <edit-billing-address :billing_address="address"/>

    </div>
</template>

<script>
    import EditBusinessAddress from "./EditBusinessAddress";
    import EditWareHouseAddress from "./EditWareHouseAddress";
    import EditBillingAddress from "./EditBillingAddress";
    export default {
        props : ['address'],
        components :{
            EditWareHouseAddress,
            EditBillingAddress,
            EditBusinessAddress
        },

        data () {
            return {
                business_address :{
                    b_complete_address:  '',
                    b_street_address: '',
                    b_route : '',
                    b_city :  '',
                    b_subrub : '',
                    b_postal_code : '',
                    b_country : '',
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
