<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    protected $fillable = ['product_id','image'];


    public function saveImages($images,$product_id){
        foreach ($images as $img){
            $this::create([
                'image' => $img,
                'product_id' => $product_id,
            ]);
        }
    }
}
