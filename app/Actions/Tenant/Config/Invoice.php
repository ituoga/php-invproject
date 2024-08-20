<?php

namespace App\Actions\Tenant\Config;

use App\Services\ConfigService;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Invoice
{
    use AsAction;

    public function rules()
    {
        return [
            'config_pay_until' => 'required',
            'config_pvm_from' => 'required',
            'config_rows_per_page' => 'required',
            'invoice_series_pre' => 'required',
            'invoice_number_pre' => 'required',
            'invoice_series_deb' => 'required',
            'invoice_number_deb' => 'required',
            'invoice_series_cre' => 'required',
            'invoice_number_cre' => 'required',
        ];
    }

    public function handle(ActionRequest $request, ConfigService $service)
    {
        return $service->create($request->validated());

    }
}
