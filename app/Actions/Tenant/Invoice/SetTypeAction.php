<?php

namespace App\Actions\Tenant\Invoice;

use App\Enums\InvoiceTypeEnum;

class SetTypeAction
{
    public function handle(InvoiceTypeEnum $type)
    {
        session()->put("invoice.type", $type->value);
        return redirect()->to("/invoices/create");
    }
}
