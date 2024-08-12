<?php

declare(strict_types=1);

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\ContrahentController;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\Config;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Stancl\Tenancy\Features\UserImpersonation;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    
    Route::get("/", function () {
        return "tenant";
    });

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    })->name('impersonate');

    Route::middleware(["auth:tenant"])->group(function () {


        Route::get('/', function () {
            // return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
            return view("empty");
        })->name("dashboard");

        Route::get("logout", function () {
            Auth::guard('web')->logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return redirect('/');
        });

        // Route::resource("invoices", InvoiceController::class);

        Route::get("invoices/create", Invoice\CreateController::class)->name("invoices.create");
        Route::get("invoices/{id}", Invoice\ReadController::class)->name("invoices.read");
        Route::put("invoices/{id}", Invoice\UpdateController::class)->name("invoices.update");
        Route::delete("invoices/{id}", Invoice\DeleteController::class)->name("invoices.delete");
        Route::get("invoices/{id}/edit", Invoice\EditController::class)->name("invoices.edit");
        Route::post("invoices", Invoice\StoreController::class)->name("invoices.store");
        Route::get("invoices", Invoice\IndexController::class)->name("invoices.index");



        Route::resource('contrahents', ContrahentController::class);

        Route::resource("products", ProductController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::post("/profile/config", Config\StoreController::class)->name('config.update');
    });
    
});
