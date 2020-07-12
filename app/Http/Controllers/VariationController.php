<?php

namespace App\Http\Controllers;

use App\Http\Resources\VariactionCollection;
use App\Product;
use App\Variation;
use App\VariationOption;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    private $variation;
    private $option;
    public function __construct(Variation $variation,VariationOption $option)
    {
        $this->variation = $variation;
        $this->option = $option;
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


    public function storeOption(Request $request){
        $form_data = $request->all();
        $this->option->saveOption($form_data);
        return response()->json("Option Has Been Created Successfully",200);
    }

}
