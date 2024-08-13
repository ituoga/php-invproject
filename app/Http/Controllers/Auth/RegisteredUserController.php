<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tenant' => ["required", "min:3", "max:100", "unique:tenants,id"],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tenant = Tenant::create(["id" => $request->tenant, "email" => $request->email]);
        $domain = $tenant->createDomain($request->tenant . "." . env("CENTRAL_DOMAIN"));
        /**
         * @var \App\Models\Domain $domain
         */
        $domain->makePrimary();

        Artisan::call('tenants:migrate', [
            '--tenants' => [$tenant->getTenantKey()],
        ]);
        Artisan::call("tenant:create-user", [
            "--tenants" => [$tenant->getTenantKey()],
            "--email" => $request->email,
            "--password" => $request->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect($tenant->impersonationUrl(1));
    }
}
