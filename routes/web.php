<?php

use App\Http\Controllers\ContrahentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::get('/', function () {
  return view('welcome');
});

foreach (config('tenancy.central_domains') as $domain) {
  Route::domain($domain)->group(function () {
    // your actual routes

    Route::get('/dashboard', function () {
      return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get("/login", function () {
      // $a = Auth::guard("web")->loginUsingId(1);
      $a = Tenant::first();
      // dd($a->impersonationUrl(1));
      return redirect()->to($a->impersonationUrl(1));
  })->name("login");

    Route::middleware('auth')->group(function () {

      
    });
  });
}

// Route::middleware([
//   'web',
//   InitializeTenancyByDomainOrSubdomain::class,
//   PreventAccessFromCentralDomains::class,
// ])->group(function () {
//   Route::get('/', function () {
//     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//   });
// });


Route::get("/manifest.json", function () {

  $sname = config("app.name");
  $name = config("app.name");

  $json = <<<JSON
  {
    "version": "1.3",
    "short_name": "{$sname}",
    "name": "{$name}",
    "share_target": {
      "action": "/tasks/create",
      "method": "GET",
      "params": {
        "title": "title",
        "text": "text",
        "url": "url"
      }
    },
    "start_url": "/dashboard",
    "background_color": "#ffffff",
    "display": "minimal-ui",
    "theme_color": "#0d085c",
    "icons": [
      {
        "src": "/favicon.png",
        "type": "image/png",
        "sizes": "512x512",
        "purpose": "any maskable"
      }
    ]
  }
  JSON;
  // if (config('app.env') != 'production') {
  //   \Barryvdh\Debugbar\Facade::disable();
  // }
  return response($json)->withHeaders([
    'Content-Type' => 'application/json',
    'Access-Control-Allow-Origin' => '*',
    'Access-Control-Allow-Methods' => 'GET',
    'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept',
    'Access-Control-Max-Age' => '86400'
  ]);
});

require __DIR__ . '/auth.php';
