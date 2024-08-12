<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Services\BaseServiceInterface;

class BaseController extends Controller
{
    protected string $module = "invoices";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }
}
