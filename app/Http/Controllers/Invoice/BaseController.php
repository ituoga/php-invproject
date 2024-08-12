<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudController;
use App\Services\BaseServiceInterface;

class BaseController extends CrudController
{
    protected string $module = "invoices";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }
}
