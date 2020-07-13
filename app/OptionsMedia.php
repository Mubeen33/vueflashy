<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsMedia extends Model
{
     protected $fillable = ['image','variation_option_id'];



     public function option(){
         return $this->belongsTo(VariationOption::class);
     }


    public function saveImages($images,$option_id){
        foreach ($images as $img){
            $this::create([
                'image' => $img,
                'variation_option_id' => $option_id,
            ]);
        }
    }
}
