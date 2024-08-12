<?php

namespace App\Http\Middleware;

use Closure;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain as BaseInitializeTenancy;

class InitializeTenancy extends BaseInitializeTenancy
{
    public function handle($request, Closure $next)
    {
        // Add custom tenant initialization logic here
        return parent::handle($request, $next);
    }
}