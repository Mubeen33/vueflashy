<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'title',
        'sku',
        'default_price',
        'category_id',
        'brand_id',
        'is_physical',
        'is_digital',
        'product_for_sale',
        'product_for_list',
        'product_description',
        'added_by',
        'is_submitted',
        'is_active',
    ];


    public function saveProduct($form_data){
       return  $this::create($form_data);
    }

    public function variations(){
        return $this->belongsToMany(Variation::class,'product_variations','product_id','variation_id');
    }



}
