<?php

namespace App\Http\Controllers;

use App\Http\Resources\VariactionCollection;
use App\OptionsMedia;
use App\Product;
use App\Variation;
use App\VariationOption;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    private $variation;
    private $option;
    private $optionImg;
    public function __construct(Variation $variation,VariationOption $option,OptionsMedia $optionImg)
    {
        $this->variation = $variation;
        $this->option = $option;
        $this->optionImg = $optionImg;
    }

    public function storeVariation(Request $request){
        $form_data = $request->except('product_id');
        $variation = $this->variation->saveVariation($form_data);
        $variation->products()->attach($request->product_id);
        return response()->json("Variation Has Been Created Successfully",200);
    }


    public function getProductVariations($id){
        $product = Product::find($id);
        $variations = $product->variations()->with('options')->get();
      return new VariactionCollection($variations);
    }


    public function deleteVariation($id){
       $variation = $this->variation->findOrFail($id);
       if ($variation){
           $variation->delete();
           return response()->json("Variation Has Been Deleted Successfully",200);
       }else{
           return response()->json("Variation Not Found",200);
       }

    }


    public function storeOption(Request $request){
        $form_data = $request->except("option_images");
        $img =  $request->option_images;
        $option = $this->option->saveOption($form_data);
        $this->optionImg->saveImages($img,$option->id);
        return response()->json("Option Has Been Created Successfully",200);
    }



    public function storeOptionsImages(Request $request){
        if ($request->hasFile('option_image')){
            $img_name = date('ymd-').$request->option_image->getClientOriginalName();
            $request->option_image->move(public_path('/option_images'),$img_name);
            return response()->json($img_name,200);
        }
        return response()->json("No Image Found",500);
    }


}
