<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }





    public function getCategories(){
        $categories = Category::with('categories')->where('parent_id',0)->get();
        return response()->json($categories,'200');
    }


    public function getCatChild($id){
        $categories = Category::with('categories')->where('parent_id',$id)->get();
        return view('partial-views._categories-list',compact('categories'));
    }


   public function storeProduct(Request $request){
       $form_data = $request->all();
       $product = $this->product->saveProduct($form_data);
       return response()->json($product,200);
   }

}
