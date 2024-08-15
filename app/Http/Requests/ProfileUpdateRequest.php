<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "seller_idv" => ["required", Rule::in(["taip", "ne"])],
            "seller_name" => "required",
            'seller_code' => "required",
            "seller_vat" => "nullable",
            "seller_phone" => "nullable",
            "seller_email" => "nullable",
            "seller_address" => "nullable",
            "seller_country" => "nullable",
            "seller_bank" => "required",
    
        ];
    }
}
