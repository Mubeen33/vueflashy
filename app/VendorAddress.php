<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorAddress extends Model
{
    protected $guarded = ['id','created_at','updated_at'];


    public function storeAddress($form_data, $vendor_id){
        $this->create(
            [
            "b_complete_address" => $form_data['b_complete_address'],
            "b_street_address" => $form_data['b_street_address'],
            "b_route" => $form_data['b_route'],
            "b_city" => $form_data['b_city'],
            "b_subrub" => $form_data['b_subrub'],
            "b_postal_code" => $form_data['b_postal_code'],
            "b_country" => $form_data['b_country'],

            "w_complete_address" => $form_data['w_complete_address'],
            "w_street_address" => $form_data['w_street_address'],
            "w_route" => $form_data['w_route'],
            "w_city" => $form_data['w_city'],
            "w_subrub" => $form_data['w_subrub'],
            "w_postal_code" => $form_data['w_postal_code'],
            "w_country" => $form_data['w_country'],

            "billing_complete_address" => $form_data['billing_complete_address'],
            "billing_street_address" => $form_data['billing_street_address'],
            "billing_route" => $form_data['billing_route'],
            "billing_city" => $form_data['billing_city'],
            "billing_subrub" => $form_data['billing_subrub'],
            "billing_postal_code" => $form_data['billing_postal_code'],
            "billing_country" => $form_data['billing_country'],
            "vendor_id" => $vendor_id
            ]);

    }


    public function updateAddress($form_data, $id){
        $this::where("vendor_id",$id)->update($form_data);
    }



}
