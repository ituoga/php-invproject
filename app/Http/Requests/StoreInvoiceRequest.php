<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'invoice_number' => 'required',
            'invoice_series' => 'required',
            'invoice_currency' => 'required',
            'document_date' => 'required',
            'pay_until' => 'required',
            'invoice_total' => 'required',
            'invoice_vat' => 'required',
            'invoice_total_with_vat' => 'required',

            'contrahent_code' => 'required',
            'contrahent_name' => 'required',
            'contrahent_vat' => 'nullable',
            'contrahent_email' => 'nullable',
            'contrahent_phone' => 'nullable',
            'contrahent_address' => 'nullable',
            'contrahent_country' => 'nullable',
            
            'lines.*' => 'required|array|min:1',
            'lines.*.product_name' => 'required',
            'lines.*.product_qty' => 'required',
            'lines.*.product_price' => 'required',
            'lines.*.unit' => 'required',
            'lines.*.vat' => 'required',
            'lines.*.total' => 'required',

            "invoice_notes" => "nullable",
            "invoice_author" => "required",
            "invoice_contrahent" => "nullable",
            "invoice_comment" => "nullable",

        ];
    }
}
