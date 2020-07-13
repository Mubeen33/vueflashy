<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function variations(){
        return $this->belongsTo(Variation::class);
    }



    public function saveOption($form_data){
        return  $this::create($form_data);
    }
}
