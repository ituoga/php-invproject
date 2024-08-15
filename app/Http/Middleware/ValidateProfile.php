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
        if(app(Config::class)->count() === 0 && !$request->routeIs('profile.edit')) {
            return redirect()->route('profile.edit')->with('status', 'profile-missing');
        }
        return $next($request);
    }
}
