<?php

namespace App\Http\Controllers;

use App\SellerRequest;
use Illuminate\Http\Request;

class SellerRequestController extends Controller
{

    protected $sellerRequest;
    public function __construct(SellerRequest $sellerRequest)
    {
        $this->sellerRequest = $sellerRequest;
    }



    public function storeSellerRequest(Request $request){
        $this->sellerRequest->storeRequest($request->all());
        return response()->json("Your Request Has Been Received Successfully..",200);
    }

}
