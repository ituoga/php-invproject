<?php

namespace App\Http\Controllers\Invoice;


class CreateController extends BaseController
{
    public function __invoke()
    {
        return $this->service->create();
    }
}
