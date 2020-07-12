<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    protected $guarded = ['id','created_at','updated_at'];



    public function storeRequest($form_data){
        $this::create($form_data);
    }

}

