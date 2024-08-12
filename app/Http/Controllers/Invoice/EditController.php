<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Request $request, $id)
    {
        return $this->service->edit($id);
    }
    
}
