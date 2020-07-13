<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductMedia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    private $media;
    public function __construct(Product $product,ProductMedia $media)
    {
        $this->product = $product;
        $this->media = $media;
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
       $images = $request->product_images;
       $form_data = $request->except('product_images');
       $product = $this->product->saveProduct($form_data);
       $this->media->saveImages($images,$product->id);
       return response()->json($product,200);
   }



   public function storeProductImages(Request $request){
        if ($request->hasFile('product_image')){
            $img_name = date('ymd-').$request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('/product_images'),$img_name);
            return response()->json($img_name,200);
        }
       return response()->json("noting found",200);
   }



}
