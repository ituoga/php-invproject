<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContrahentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "code" => "required|string|unique:contrahents",
            "vat" => "nullable|string",
            "email" => "nullable|string",
            "phone" => "nullable|string",
            "address" => "nullable|string",
            "country" => "nullable|string",

        ];
    }
}
