<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Vendor extends Model
{
        protected $guarded = ['id','created_at','updated_at'];


        public function bankDetails(){
           return $this->hasOne(BankDetail::class);
        }

       public function address(){
         return $this->hasOne(VendorAddress::class);
       }



       public function getSellers(){
         return  $this::with('bankDetails','address')->get();
       }


       public function getDetails($id){
          return $this::with('bankDetails','address')->find($id);
       }











    public function storeVendor($form_data){
        return   $this::create([
            "first_name" => $form_data['first_name'],
            "last_name" => $form_data['last_name'],
            "mobile_num" => $form_data['mobile_num'],
            "phone_number" => $form_data['phone_number'],
            "display_name" => $form_data['display_name'],
            "legal_name" => $form_data['legal_name'],
            "reg_num" => $form_data['reg_num'],
            "role" => $form_data['role'],
            "VAT_num" => $form_data['VAT_num'],
            "business_description" => $form_data['business_description'],
            "email" => $form_data['email'],

            "physical_products" => $form_data['is_physical'],
            "digital_products" => $form_data['is_digital'],
            "product_for_sale" => $form_data['products_for_sale'],
            "add_priceless_products" => $form_data['for_price'],
            "add_ordinary_products" => $form_data['for_listing'],

        ]);
    }

    public function updateVendor($form_data,$id){
            $this::where('id',$id)->update($form_data);
    }


}
