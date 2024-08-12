<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Services\BaseServiceInterface;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected string $module = "configs";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }
}
