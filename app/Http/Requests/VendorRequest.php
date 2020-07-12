<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => "required|max:100|min:2",
            "last_name" => "required|max:100|min:2",
            "mobile_num" => "required|max:100|min:2",
            "phone_number" => "required|max:100|min:2",
            "display_name" => "required|max:100|min:2",
            "legal_name" => "required|max:100|min:2",
            "reg_num" => "required|max:100|min:2",
            "VAT_num" => "required|max:100|min:2",
            "business_description" => "required|max:900|min:2",
            "email" => "required|max:100|min:2",

            "account_holder" => "required|max:100|min:2",
            "account_name" => "required|max:100|min:2",
            "bank_name" => "required|max:100|min:2",
            "branch_name" => "required|max:200|min:2",
            "branch_code" =>"required|max:100|min:2",
            "bank_address" => "required|min:2",

            "b_complete_address" => "required|min:2",
            "b_street_address" => "required|min:2",
            "b_route" => "required|max:100|min:2",
            "b_city" => "required|max:100|min:2",
            "b_subrub" => "required|max:100|min:2",
            "b_postal_code" => "required|max:100|min:2",
            "b_country" => "required|min:2",

            "w_complete_address" => "required|max:100|min:2",
            "w_street_address" => "required|max:100|min:2",
            "w_route" => "required|max:100|min:2",
            "w_city" => "required|max:100|min:2",
            "w_subrub" => "required|max:100|min:2",
            "w_postal_code" => "required|max:100|min:2",
            "w_country" => "required|max:100|min:2",

            "billing_complete_address" => "required|max:300|min:2",
            "billing_street_address" => "required|max:300|min:2",
            "billing_route" => "required|max:140|min:2",
            "billing_city" => "required|max:100|min:2",
            "billing_subrub" => "required|max:100|min:2",
            "billing_postal_code" => "required|max:100|min:2",
            "billing_country" => "required|max:100|min:2"
        ];
    }
}
