<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreInvoiceRequest $request)
    {
        return $this->service->store($request->validated());
    }
}
