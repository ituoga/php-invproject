<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $data)
    {
        return $this->service->create($data->except(["_token","id"]));
    }
}
