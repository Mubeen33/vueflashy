<?php

namespace App\Http\Controllers\Admin;
use App\BankDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Vendor;
use App\VendorAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SellerController extends Controller
{

    private $vendor;
    private $address;
    private $bank;

    /**
     * HomeController constructor.
     * @param Vendor $vendor
     * @param VendorAddress $address
     * @param BankDetail $bank
     */
    public function __construct(Vendor $vendor, VendorAddress $address ,BankDetail $bank)
    {
        $this->vendor = $vendor;
        $this->address = $address;
        $this->bank = $bank;
    }


    /**
     * Store vendor Information's
     *
     * @param VendorRequest $request
     * @return mixed
     */
    public function storeVendor(VendorRequest $request){

        $docs = null;
        if ($request->hasFile('bank_doc')){
            $name =  time().$request->bank_doc->getClientOriginalName();
            $request->bank_doc->move(public_path('vendor_docs/'),$name);
            $docs = $name;
        }
        $form_data = $request->all();
//        store vendor details
        $vendor = $this->vendor->storeVendor($form_data);
//       store vendor bank details
        $this->bank->storeBankDetail($form_data,$vendor->id,$docs);
//        store address information
        $this->address->storeAddress($form_data,$vendor->id);

        return response()->json('New Vendor Has Been Added Successfully ...','200');
    }



     public function sellersList(){
        $vendors = $this->vendor->getSellers();
        return response()->json($vendors);
     }


    public function sellerDetails($id){
        $vendor = $this->vendor->getDetails($id);
        return response()->json($vendor,'200');
    }

}
