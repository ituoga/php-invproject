<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\AutoCompleteService;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function __construct(
        protected AutoCompleteService $service
    ) {}
    
    public function __invoke()
    {
        return $this->service->search(request()->q);
    }
}
