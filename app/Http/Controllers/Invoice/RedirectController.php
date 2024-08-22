<?php

namespace App\Http\Controllers\Invoice;


use App\Actions\Tenant\Invoice\SetTypeAction;
use App\Enums\InvoiceTypeEnum;
use App\Http\Controllers\Controller;

class RedirectController extends Controller
{
    public function __construct(
        protected SetTypeAction $action,
    )
    {}
    public function __invoke($enum)
    {
        return $this->action->handle(InvoiceTypeEnum::from($enum));
    }
}
