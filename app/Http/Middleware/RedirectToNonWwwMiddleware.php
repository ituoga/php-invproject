<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RedirectToNonWwwMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (substr($request->header('host'), 0, 4) == 'www.') {
            $request->headers->set('host', app("tenancy.central_domains")[0]);
            return Redirect::to($request->path());
        }
        return $next($request);
    }
}
