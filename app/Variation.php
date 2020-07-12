<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $guarded = ['id','created_at','updated_at'];


    public function products(){
        return $this->belongsToMany(Product::class,'product_variations','variation_id','product_id');
    }


    public function options(){
        return $this->hasMany(VariationOption::class,'variation_id','id');
    }

    public function saveVariation($form_data){
       return $this::create($form_data);
    }

}
