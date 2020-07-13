<!-- =========================================================================================
    File Name: FormWizardNumberTab.vue
    Description: Form wizard with numbers in tabs
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vx-card code-toggler class="border pb-0">
        <div class="mt-2">
<!--                  Pop Up Modal For Add Vacation-->
            <vs-popup class="holamundo add-variation"  title="Create Variation of Product" :active.sync="popupActive">
                <form @submit.prevent="saveVariation" method="post"  id="variactions_form">
                    <input type="hidden" name="product_id" v-model="product_id">
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="form-group mb-3">
                                    <label for="label" class="label-font">Label</label>
                                    <input class="form-control pt-2 pb-2" name="label" v-model="variation.label" id="label" placeholder="Add Variation Title" required>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="form-group mb-3">
                                    <vs-select @change="variationChanged" v-model="variation.variation_type" class="w-full select-large" label="Variation Type">
                                        <vs-select-item  :key="index" :value="item.value" :text="item.text" v-for="(item,index) in variation_types" class="w-full" />
                                    </vs-select>
                                </div>
                            </div>

                            <div v-if="is_display_option" class="col-md-11 div-display-option border-bottom pt-3 pb-1">
                                <h5 class="pl-1 font-theme">Option Display Type</h5>
                                <div class="row pl-2">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input  @change="radioOptionChanged" type="radio" class="custom-control-input" value="text" name="display_option" v-model="variation.display_type" id="customRadio1" >
                                            <label class="custom-control-label label-font" for="customRadio1" >
                                                Text
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input @change="radioOptionChanged" type="radio" v-model="variation.display_type" class="custom-control-input" value="image" name="display_option" id="customRadio2">
                                            <label class="custom-control-label label-font" for="customRadio2" >
                                                Image
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input @change="radioOptionChanged" type="radio" v-model="variation.display_type" class="custom-control-input" value="color" name="display_type" id="customRadio3">
                                            <label class="custom-control-label label-font" for="customRadio3" >
                                                Color
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="is_image" class="col-md-11 div-show-on-slider border-bottom pt-5 pb-1">
                                <h5 class="font-theme">Show Option Images on Slider When an Option is Selected</h5>
                                <div class="row pl-2">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" v-model="variation.is_option_on_slider" value="1" name="is_option_on_slider" id="customRadio5" required>
                                            <label class="custom-control-label label-font" for="customRadio5" >
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" v-model="variation.is_option_on_slider" value="0" name="is_option_on_slider" id="customRadio22" required>
                                            <label class="custom-control-label label-font" for="customRadio22" >
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!--                            <div v-if="is_dif_price" class="col-md-11 pt-5 div-price pb-1">-->
<!--                                <h5 class=" font-theme">Use Different Price for Options</h5>-->
<!--                                <div class="row pl-2">-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="custom-control custom-radio">-->
<!--                                            <input type="radio" class="custom-control-input" v-model="variation.is_different_price" value="1" name="is_different_price" id="customRadio52" required>-->
<!--                                            <label class="custom-control-label label-font" for="customRadio52" >-->
<!--                                                Yes-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="custom-control custom-radio">-->
<!--                                            <input type="radio" class="custom-control-input" v-model="variation.is_different_price" value="0" name="is_different_price" id="customRadio222" required>-->
<!--                                            <label class="custom-control-label label-font" for="customRadio222" >-->
<!--                                                No-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-md-11 pt-5 text-right">
                                <button type="submit" class="vs-component vs-button vs-button-primary vs-button-filled">
                                    Create Variation
                                </button>
                            </div>
                        </div>
                </form>
            </vs-popup>
            <!--      Pop Up Modal For Add Options On Vacations-->
            <vs-popup class="holamundo"  title="Add Option On Variation" :active.sync="popupAddOption">
                <form @submit.prevent="saveOption(addOptionsVariation.id)" method="post">
                    <div class="row justify-content-center">
                        <div v-if="addOptionsVariation.display_type === 'image' " class="col-md-11 div-show-on-slider border-bottom pt-5 pb-1">
                            <h5 class="font-theme">Show Option Images on Slider as Default Image</h5>
                            <div class="row pl-2">
                                <div class="col-md-4">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" v-model="option.is_default" value="1" name="is_default" id="customRadio53" required>
                                        <label class="custom-control-label label-font" for="customRadio53" >
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" v-model="option.is_default" value="0" name="is_default" id="customRed" required>
                                        <label class="custom-control-label label-font" for="customRed" >
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="form-group mb-3">
                                <label for="label1" class="label-font">Label</label>
                                <input class="form-control pt-2 pb-2"  name="option_name" v-model="option.option_name" id="label1" placeholder="Add Option Title" required>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="form-group mb-3">
                                <label for="lab" class="label-font">Stock Quantity</label>
                                <input class="form-control pt-2 pb-2"  name="stock_qty" v-model="option.stock_qty" id="lab" placeholder="Stock Quantity" required>
                            </div>
                        </div>
                        <div v-if="addOptionsVariation.is_different_price" class="col-md-11">
                            <div class="form-group mb-3">
                                <label for="selling_price" class="label-font">Price</label>
                                <input type="number" class="form-control pt-2 pb-2"  name="selling_price" v-model="option.selling_price" id="selling_price" placeholder="Add Option Price" required>
                            </div>
                        </div>
                        <div v-if="addOptionsVariation.display_type === 'image'" class="col-md-11">
                            <div class="form-group mb-1">
                                <h3 class="mt-4 mb-1">Add Option Images</h3>
                                <div class="mt-4">
                                    <vs-upload multiple automatic fileName="option_image" text="Product Images" :action="this.$baseApiDomain+'/api/seller/store-option-images'" @on-success="optionUploadImg" />
                                </div>

                            </div>
                        </div>

                       <div class="col-md-11 text-right">
                           <button class="btn btn-outline-dark" type='submit'>
                               Save Option
                           </button>
                       </div>

                    </div>
                </form>
            </vs-popup>

<!--             Pop up Modal For Options List-->
            <vs-popup  class="holamundo options-list-modal"  title="Options List" :active.sync="popupShowOption">
                    <div class="row justify-content-center">
                        <div v-if="options.length > 0" class="col-md-12">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Label </th>
                                    <th>Price</th>
                                    <th>Quantity </th>
                                    <th>Is Default</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="opt in options">
                                    <td>{{opt.image}}</td>
                                    <td>{{opt.option_name}}</td>
                                    <td>{{opt.selling_price}}</td>
                                    <td>{{opt.stock_qty}}</td>
                                    <td>{{opt.is_default ? "YES":'NO'}}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" type="button">
                                            <i class="feather icon-edit"></i>   Edit
                                        </button>
                                        <button class="btn btn-dark btn-sm" type="button">
                                            <i class="feather icon-trash"></i>  Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </vs-popup>



            <form-wizard ref="wizard" color="rgba(var(--vs-primary), 1)" :title="null" :subtitle="null" :hide-buttons="true" finishButtonText="Submit">
                <tab-content title="Step 1" class="mb-5">
                <form @submit.prevent="saveProduct" method="post" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body pt-4 pb-3 border">
                                <div class="row pb-4">
                                    <div class="col-md-12">
                                        <h3 class="mb-3">Product Type</h3>
                                    </div>
                                    <div class="col-md-6 pt-3">
                                        <div class="physical">
                                            <vs-checkbox name="is_physical" v-model="product.is_physical" value='1'>
                                                 <span class="text-dark pl-2"> Physical</span>
                                            </vs-checkbox>
                                            <small class="padding-left text-dark">A tangible product that you will ship to buyers</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-3">
                                        <div class="physical">
                                            <vs-checkbox name="is_digital" v-model="product.is_digital" value="1">
                                                <span class="text-dark pl-2"> Digital</span>
                                            </vs-checkbox>
                                            <small class="padding-left text-dark">
                                                A Digital File that a buyer will Download
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-12 mt-2">
                            <div class="card">
                                <div class="card-body pt-4 pb-3 border">
                                    <div class="row pb-4">
                                        <div class="col-md-12">
                                            <h3 class="mb-3">Listing Type</h3>
                                        </div>
                                        <div class="col-md-6 pt-3">
                                            <div class="physical">
                                                <vs-checkbox name="product_for_sale" v-model="product.product_for_sale" value="1">
                                                    <span class="text-dark pl-2"> Add Product For Sale</span>
                                                </vs-checkbox>
                                                <small class="padding-left text-dark">Add product for sale on site ( commission can taken )</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pt-3">
                                            <div class="physical">
                                                <vs-checkbox name="product_for_list" v-model="product.product_for_list" value="1">
                                                    <span class="text-dark pl-2"> Add a Product or Service as an Ordinary Listing </span>
                                                </vs-checkbox>
                                                <small class="padding-left text-dark">
                                                    Add Product or Service Without buy option
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-body border">
                                <div class="row pb-4">
                                    <div class="col-md-12">
                                        <h3 class="mb-3">Product Details</h3>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="title">Product Title</label>
                                            <input type="text" class="form-control" name="title" v-model="product.title" placeholder="Product Title" id="title" v-validate="'required'">
                                            <span class="text-danger text-sm" v-show="errors.has('title')">{{ errors.first('title') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="sku">Product Sku</label>
                                            <input type="text" v-model="product.sku" class="form-control" name="sku" placeholder="Product Title" id="sku" v-validate="'required'">
                                            <span class="text-danger text-sm" v-show="errors.has('sku')">{{ errors.first('sku') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="category_tree">Select Category</label>
                                            <input @focus="showCategoriesBox" type="text" name="category" class="form-control"  placeholder="Product Category" id="category_tree" readonly v-validate="'required'">
                                            <span class="text-danger text-sm" v-show="errors.has('category')">{{ errors.first('category') }}</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="category_id" v-model="product.category_id">
                                    <div v-if="cat_box" class="col-12 border categories-box bg-light-badge pt-1 pb-1">
                                        <div class="row categories-row">
                                            <div class="col-md-3 cat-one pr-0" >
                                                <div class="dropdown">
                                                    <div id="myDropdown"  class="dropdown-content border cat-dropdown">
                                                        <i class="feather icon-search position-absolute search-icon"></i>
                                                        <input type="text" name="search_cat" class="form-control search-cat" placeholder="Search..">
                                                        <ul id="myList" class="list-group-flush pl-0 border-top-0 cat-list">
                                                            <li v-for="cat in categories" v-bind:id="'/api/seller/categories-child/'+cat.id" v-bind:class="[cat.categories.length ? 'parent-category' : 'remove-next']" :data-id='cat.id'  class="list-group-item">
                                                                <span class="cat-value"> {{cat.name}}</span>
                                                                 <i v-if="cat.categories.length > 0" class="feather icon-arrow-right float-right mr-0 mt-1"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="mb-0 mt-5">
                                                        <strong id="cat_tree" class="text-capitalize"></strong>
                                                    </p>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary btn-done" v-bind:disabled="isButtonDisabled">Done</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-12 pt-5">
                                        <h3 class="mt-4 mb-1">Upload Product Images</h3>
                                        <small>Products  with good and clear images sold faster .. ! </small>

                                        <div class="mt-4">
                                            <vs-upload multiple fileName='product_image' automatic   action="http://127.0.0.1:8000/api/seller/store-product-images" @on-success="successUpload" @on-delete="imageDelete" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pb-3">
                        <h3 class="mt-4 mb-1">Product Description</h3>
                        <small>Add brief description of your product .. ! </small>
                        <textarea rows="4" class="form-control" name="Product Description" v-model="product.product_description" placeholder="Description"  v-validate="'required'"></textarea>
                    </div>
                    <div class="col-md-12 text-right pt-5">
                            <button type="submit" class="vs-component vs-button vs-button-primary vs-button-filled mt-3">
                                Save & Next <i class="feather icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                </form>
                </tab-content>

                <!-- tab 2 content -->
                <tab-content title="Step 2" class="mb-5">
                    <div class="row">
                        <div class="card mb-1 w-100">
                            <div class="card-body border">
                                <div class="col-md-12 pt-2 mb-3">
                                    <h3 class="mb-1">Add Variations</h3>
                                    <small>Add Available options , like colors or sizes that buyers can choose during checkout  </small>
                                </div>
                                <div class="col-md-12 pt-5">
                                    <button @click="popupActive=true" class="btn btn-info mr-2">Add Variation </button>
                                    <button class="btn btn-dark ml-2">Select Existing Variation</button>
                                </div>
                            </div>
                        </div>

<!--                         Variations Table-->
                        <div v-if="variations.length > 0" class="col-md-12 p-0">
                            <div class="card">
                                <div class="card-body border pt-2 pb-2">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title </th>
                                            <th>Variation Type</th>
                                            <th> </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="vary in variations">
                                            <td>{{vary.id}}</td>
                                            <td class="text-capitalize">
                                                {{vary.label}}
                                            </td>
                                            <td class="text-capitalize">
                                                {{vary.variation_type}}
                                            </td>
                                            <td>
                                                <button @click="addOptionPopup(vary)" class="btn btn-primary btn-sm" type="button">
                                                  <i class="feather icon-plus"></i>  Add option
                                                </button>
                                                <button @click="getOptions(vary.options)" class="btn btn-dark btn-sm" type="button">
                                                    <i class="feather icon-list"></i>   Option List
                                                </button>
                                            </td>
                                            <td>
<!--                                                <button class="btn btn-info btn-sm" type="button">-->
<!--                                                    <i class="feather icon-edit"></i>   Edit-->
<!--                                                </button>-->
                                                <button @click="deleteVariation(vary.id)" class="btn btn-danger btn-sm" type="button">
                                                    <i class="feather icon-trash"></i>  Delete
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 p-0 mt-3">
                            <div class="card">
                                <div class="card-body border">
                                    <div class="row pb-4">
                                        <div class="col-md-12">
                                            <h3 class="mb-3">Shipping Cost</h3>
                                        </div>
                                        <div class="col-md-12 mb-2 pt-3">
                                            <div class="physical">
                                                <vs-checkbox>
                                                    <strong class="text-dark pl-2">Buyers Pays</strong>
                                                </vs-checkbox>
                                                <small class="padding-left text-dark">Courier Will Manage By FlashyBuy</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="physical">
                                                <vs-checkbox>
                                                    <strong class="text-dark pl-2"> Free Shipping</strong>
                                                </vs-checkbox>
                                                <small class="padding-left text-dark">
                                                    Seller Will Pay For The Shipping  ( View shipping fee ) Free Shipping Products get
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right pt-5">
                            <button type="button" @click="goNext"  class="vs-component vs-button vs-button-primary vs-button-filled mt-3">
                                Save & Next <i class="feather icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </tab-content>

                <!-- tab 3 content -->
                <tab-content title="Step 3" class="mb-5">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-body border">
                                <div class="row pb-4">
                                    <div class="col-md-12">
                                        <h3 class="mb-3">Product Preview</h3>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="title">Product Title</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="sku">Product Sku</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="category_tree">Selected Category</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="sku">Product Description</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pt-5">
                                        <h3 class="mt-4 mb-1">Product Images</h3>
                                        <div class=" col-md-3 pr-0 mt-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>

            </form-wizard>
        </div>
    </vx-card>
</template>

<script>
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    import Input from "../../forms/form-elements/input/Input";
    import MutiImagesUpload from "./MutiImagesUpload";
    import TextareaCounter from "../../forms/form-elements/textarea/TextareaCounter";
    import Textarea from "../../forms/form-elements/textarea/Textarea";
    import Button from "../../components/vuesax/button/Button";
    import $ from 'jquery';

    export default {
        components: {
            Button,
            Textarea,
            TextareaCounter,
            Input,
            MutiImagesUpload,
            FormWizard,
            TabContent,
        },
        data () {
            return {
                listPosition: [
                    'top-right',
                    'top-left',
                ],
                categories : [],
                cat_box : false,
                isButtonDisabled : true,
                popupActive : false,
                popupShowOption: false,
                is_dif_price : false,
                is_image : false,
                is_display_option : false,

                product :  {
                category_id : null,
                is_physical : true,
                is_digital : false,
                product_for_sale : true,
                product_for_list : false,
                title : '',
                sku : '',
                product_images :[],
                product_description : ''
                },
                //For final Submission
                is_submitted : false,
                 saved_product : {},
                product_id : null,

                variation : {
                    label : '',
                    variation_type : '',
                    display_type : '',
                    is_option_on_slider : false,
                    is_different_price : false,
                    product_id : '',
                },


                variations : [],
                variation_types: [
                    {text: 'Radio Button', value:'radio_btn'},
                    {text: 'DropDown', value:'dropdown'},
                    {text: 'Check Boxes', value:'checkbox'},
                    {text: 'Text', value:'text'},
                    {text: 'Number', value:'number'}
                ],

                popupAddOption : false,
                categoryTree : '',

                addOptionsVariation :  {},

                option : {
                    is_default : false,
                    option_name : '',
                    stock_qty : '',
                    image : '',
                    selling_price : '',
                    variation_id : '',
                    option_images : [],
                },
                options : [],
            }
        },
        created() {
            let url = this.$baseApiDomain+"/api/admin/get-categories";
            this.$http.get(url).then(response => {
                 this.categories = response.data;
            });
        },
        methods: {
            formSubmitted () {
                alert()
            },
            successUpload(event){
             console.log('image success');
                let filePaths = event.currentTarget.response;
                let str = filePaths.replace(/^"/, "");
                str = str.replace(/"$/, "");
                this.product.product_images.push(str);
                console.log(this.product.product_images);

            },
            imageDelete(event){
                console.log(event)
            },
            optionUploadImg(event){
                let filePaths = event.currentTarget.response;
                let str = filePaths.replace(/^"/, "");
                str = str.replace(/"$/, "");
                console.log(str);
                this.option.option_images.push(str);
                console.log(this.option.option_images);
            },
            successNotify(msg){
                this.$vs.notify({
                    title:'Position top-right',
                    text: msg,
                    color:'success',
                    position:'top-right',
                    icon : 'check_box',
                    time : 6000
                })
            },
            checkElement(){

            },
            showCategoriesBox(){
                this.cat_box = true;
            },
            saveProduct(){
                this.$validator.validateAll().then(result => {
                        if (result) {
                            let obj = this;
                            this.$http.post(this.$baseApiDomain+"/api/seller/store-product",this.product)
                                .then( response => {
                                    if (response.status === 200 || response.statusText === "OK"){
                                        obj.product_id = response.data.id;
                                        obj.saved_product = response.data;
                                        obj.successNotify("Product Has Been Saved Successfully.!");
                                        obj.goNext();
                                    }
                                    console.log("Product Is Here ..........");
                                    obj.variation.product_id = obj.product_id;
                                    console.log(obj.variation.product_id);
                                });
                        }});
            },
            goNext(){
                this.$refs.wizard.nextTab();
            },

            saveVariation(){
                let obj = this;
                let url = this.$baseApiDomain+"/api/seller/store-variation";
                this.$http.post(url ,this.variation)
                    .then( response => {
                        if (response.status === 200 || response.statusText === "OK"){
                            obj.refreshVariation();
                            obj.successNotify("Variation Created Successfully ...!");
                        }
                });
                this.fetchVariations(this.variation);
            },
            fetchVariations(){
                this.$http.get(this.$baseApiDomain+"/api/seller/get-product-variations/"+this.product_id)
                    .then( response => {
                        this.variations = response.data.data;
                        console.log(this.variations);
                    });
            },
            deleteVariation(var_id){
                this.$http.get(this.$baseApiDomain+"/api/seller/delete-variation/"+var_id)
                    .then( response => {
                        this.fetchVariations();
                        this.successNotify(response.data);
                    });
            },
            addOptionPopup(variation){
             this.addOptionsVariation = variation;
             this.popupAddOption = true;
            },

            saveOption(variation_id){
              let url = this.$baseApiDomain+"/api/seller/store-option"
              let obj = this;
              this.option.variation_id = variation_id;
              this.$http.post(url,obj.option).then(response => {
                  if (response.status === 200 || response.statusText === "OK"){
                  obj.successNotify("A New Option Has Been Added ...!");
                  obj.popupAddOption = false;
                  obj.option.selling_price = '';
                  obj.option.option_name = '';
                  obj.fetchVariations();
                  }
              });
            },

            getOptions(variation_options){
               this.options = variation_options;
                this.popupShowOption = true;
            },

            variationChanged(){
                let type = this.variation.variation_type;
                if (type === "radio_btn"){
                    this.is_image = false;
                    this.is_display_option = true;
                }if(type === "dropdown"){
                    this.is_image = false;
                    this.is_display_option = false;
                }
                if (type === "checkbox"){
                    this.is_image = false;
                    this.is_display_option = true;
                }
                if (type === "text" || type === "number"){
                    this.is_image = false;
                    this.is_display_option = false;
                }
            },
            radioOptionChanged(){
                this.is_image = this.variation.display_type === "image";
            },
            refreshVariation(){
                this.variation.label = '';
                this.variation.variation_type = 'radio_btn';
                this.variation.display_type = '';
                this.variation.is_option_on_slider = false;
                this.variation.is_different_price = false;
                this.popupActive = false;
            },
        },
        mounted() {
            let obj = this;
            // Jquery code for select category
            let baseUrl = this.$baseApiDomain+"/";

            /**
             * Click Method When Parent Category Selected
             */
            $('body').on('click','.parent-category',function () {
                $(this).parents(".col-md-3").nextAll().remove();
                $(this).addClass('selected-cat');
                $(this).removeClass('un-selected-cat');
                $(this).siblings().addClass('un-selected-cat');
                $(this).siblings().removeClass('selected-cat');
                let url =  $(this).attr('id');
                $('.btn-done').attr('disabled',true);
                $.get(url,function (response) {
                    $(".categories-row").append(response);
                });
                getSelectedCat();
            });
            /**
             * Click Method When Final Category Selected
             */
            $(document).on('click','.remove-next',function () {
                $(this).parents(".col-md-3").nextAll().remove();
                $(this).addClass('selected-cat');
                $(this).siblings().addClass('un-selected-cat');
                $(this).siblings().removeClass('selected-cat');
                $(this).removeClass('un-selected-cat');
                obj.product.category_id = $(this).data('id');
                getSelectedCat();
                $('.btn-done').removeAttr('disabled');
            });
            /**
             * Method To Make Tree Of Categories
             */
            function getSelectedCat() {
                let cat = "";
                let tree = "";
                let selected_category = null;
                $('.selected-cat').each(function (index) {
                    selected_category = $('.selected-cat');
                    cat = selected_category.eq(index).children('.cat-value').html();

                    if (selected_category.eq(index).hasClass("remove-next")){
                        tree = tree + cat+ ' , ';
                    }else {
                        tree = tree + cat+' >> ';
                    }
                });
                console.log(tree);

                $('#category_tree').val(tree);
                $('#cat_tree').html(tree);
                cat = "";
            }

            $('body').on('click','.btn-done',function () {
                obj.cat_box = false;
                console.log(this.cat_box);
            });

        }
    }
</script>
<style scoped>

    .font-theme{
        font-size: 14px;
    }
    .padding-left{
        padding-left: 2.6rem;
    }

    .categories-box{
        height: 22.5rem;
    }

    .list-group-flush .list-group-item{
        padding: 7px 6px 7px 8px;
    }
    ul.list-group-flush{
        max-height: 15.2rem;
        overflow: scroll;
        overflow-x: hidden;
    }
    .icon-search{
        padding: 13px 7px 5px;
    }
    .search-cat{
        padding-left: 25px;
    }
    .vx-card{
        border-radius: 0;
    }

    .list-group-flush .list-group-item:hover{
        background-color: black;
        color: white;
    }
    .selected-cat{
        background-color: black;
        color: white;
    }
    .un-selected-cat{
        background-color: white;
        color: black;
    }
</style>
