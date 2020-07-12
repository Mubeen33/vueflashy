<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $guarded = ['id','created_at','updated_at'];



       public function storeBankDetail($form_data,$vendor_id,$docs){

           $this::create([
               "account_holder" => $form_data['account_holder'],
               "account_name" => $form_data['account_name'],
               "bank_name" => $form_data['bank_name'],
               "branch_name" => $form_data['branch_name'],
               "branch_code" =>$form_data['branch_code'],
               "bank_address" => $form_data['bank_address'],
               "bank_docs" => $docs,
               "vendor_id" => $vendor_id
           ]);
       }




       public function updateBankInfo($form_data, $id){
           $this::where("vendor_id",$id)->update($form_data);
       }
}
