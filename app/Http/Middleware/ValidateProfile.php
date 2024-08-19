<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $model = app(Config::class);
        if($model->count() === 0 && !$request->routeIs('profile.edit')) {
            return redirect()->route('profile.edit')->with('status', __('Norėdami naudotis sistema - užpildykite visas skiltis'));
        }
        $config = $model->first();
        if(
            $config->company_name === null
            && $config->invoice_series_deb === null
            && $config->invoice_series_cre === null
            && $config->invoice_series_pre=== null
            && !$request->routeIs('profile.edit')) {
            return redirect()->route('profile.edit')->with('status', __('Norėdami naudotis sistema - užpildykite visas skiltis'));
        }
        return $next($request);
    }
}
