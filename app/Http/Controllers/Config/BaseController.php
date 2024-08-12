<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\CrudController;
use App\Services\BaseServiceInterface;
use Illuminate\Http\Request;

class BaseController extends CrudController
{
    protected string $module = "configs";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }
}
