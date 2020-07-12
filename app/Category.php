<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ["id","created_at","updated_at"];




    public function categories(){
       return $this->hasMany(Category::class,'parent_id','id')->with('categories');
    }

    public function catParent(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }
}
