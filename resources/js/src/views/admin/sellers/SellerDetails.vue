<template>
    <vs-tabs :position="isSmallerScreen ? 'top' : 'left'" class="tabs-shadow-none" id="profile-tabs" :key="isSmallerScreen">
        <!-- GENERAL -->
        <vs-tab icon-pack="feather" icon="icon-user" :label="!isSmallerScreen ? 'Seller Details' : ''">
            <div class="tab-general md:ml-4 md:mt-0 mt-4 ml-0">
                <edit-seller-details :vendor="vendor" />
            </div>
        </vs-tab>
        <vs-tab icon-pack="feather" icon="icon-user" :label="!isSmallerScreen ? 'Address Details' : ''">
            <div class="tab-general md:ml-4 md:mt-0 mt-4 ml-0">
                <edit-address-details :address="address" />
            </div>
        </vs-tab>
        <vs-tab icon-pack="feather" icon="icon-info" :label="!isSmallerScreen ? 'Bank Details' : ''">
            <div class="tab-info md:ml-4 md:mt-0 mt-4 ml-0">
                  <edit-bank-details :bankDetails="bankDetails" />
            </div>
        </vs-tab>

        <vs-tab icon-pack="feather" icon="icon-lock" :label="!isSmallerScreen ? 'Change Password' : ''">
            <div class="tab-change-pwd md:ml-4 md:mt-0 mt-4 ml-0">
                <user-settings-change-password />
            </div>
        </vs-tab>

        <vs-tab icon-pack="feather" icon="icon-setting" :label="!isSmallerScreen ? 'Activities' : ''">
            <div class="tab-text md:ml-4 md:mt-0 mt-4 ml-0">
                <user-settings-notifications />
            </div>
        </vs-tab>
    </vs-tabs>
</template>

<script>

    import EditSellerDetails from "./EditSellerDetails";
    import EditAddressDetails from "./EditAddressDetails";
    import EditBankDetails from "./EditBankDetails";

    import UserSettingsChangePassword from '../../pages/user-settings/UserSettingsChangePassword.vue'
    import UserSettingsNotifications from '../../pages/user-settings/UserSettingsNotifications.vue'
    import axios from "../../../axios";

    export default {
        components: {
            EditSellerDetails,
            UserSettingsChangePassword,
            EditBankDetails,
            EditAddressDetails,
            UserSettingsNotifications,
        },
        data () {
            return {
                vendor : {},
                address : {},
                bankDetails : {},
            }
        },
        computed: {
            isSmallerScreen () {
                return this.$store.state.windowWidth < 768
            }
        },
        created() {
            let url = this.$baseApiDomain+"/api/admin/seller-details/"+this.$route.params.id;
            axios.get(url).then(response =>{
                this.vendor = response.data;
                this.address = response.data.address;
                this.bankDetails = response.data.bank_details;
            });
        }
    }
</script>

<style lang="scss">
    #profile-tabs {
        .vs-tabs--content {
            padding: 0;
        }
    }
</style>
