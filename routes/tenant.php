<?php

declare(strict_types=1);

use App\Charts\VatBoundaryChart;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\ContrahentController;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\Config;
use App\Http\Controllers\Invoice\AutoCompleteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ValidateProfile;
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

    Route::middleware(["auth", LocalizationMiddleware::class])->group(function () {

        Route::middleware([ValidateProfile::class])->group(function () {

            Route::get("/set-lang", function(Request $request) {
                if($request->query("lang") == "lt" || $request->query("lang") == "en") {
                    session(["locale" => $request->get("lang")]);
                }
                return redirect()->to("/");
            });

            Route::get('/', function () {
                $chart = app(VatBoundaryChart::class);
                $chart->labels(['One', 'Two', 'Three']);
                $chart->dataset('My dataset', 'line', [1, 2, 3])->options([
                    'borderColor' => 'red',
                    'backgroundColor' => 'red',
                    'fill' => false,
                ]);

                $chart->dataset('My kita', 'line', [2, 2, 2])->options([
                    'borderColor' => 'blue',
                    'backgroundColor' => 'blue',
                    'fill' => true,
                ]);


                return view("tenant.dashboard", ['chart' => $chart]);
            })->name("dashboard");

            Route::get("logout", function () {
                Auth::guard('web')->logout();

                request()->session()->invalidate();

                request()->session()->regenerateToken();

                return redirect('/');
            });

            // Route::resource("invoices", InvoiceController::class);

            Route::get("/invoices/create/{type}", Invoice\RedirectController::class)->name("invoices.redirect");
            Route::get("invoices/create", Invoice\CreateController::class)->name("invoices.create");
            Route::get("invoices/{id}", Invoice\ReadController::class)->name("invoices.read");
            Route::put("invoices/{id}", Invoice\UpdateController::class)->name("invoices.update");
            Route::delete("invoices/{id}", Invoice\DeleteController::class)->name("invoices.delete");
            Route::get("invoices/{id}/edit", Invoice\EditController::class)->name("invoices.edit");
            Route::post("invoices", Invoice\StoreController::class)->name("invoices.store");
            Route::get("invoices", Invoice\IndexController::class)->name("invoices.index");



            Route::get("/contrahents/search", AutoCompleteController::class)->name("contrahents.search");
            Route::resource('contrahents', ContrahentController::class);

            Route::get("/products/search", \App\Actions\Tenant\Product\Search::class);
            Route::resource("products", ProductController::class);



        }); // end ValidateProfile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

//        Route::post("/profile/config", Config\StoreController::class)->name('config.update');
        Route::post("/profile/config", \App\Actions\Tenant\Config\Invoice::class)->name('config.update');
    });
});
