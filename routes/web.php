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
$domains = config('tenancy.central_domains');
$domains = [array_shift($domains)];

foreach ($domains as $domain) {
  Route::domain($domain)->middleware([\App\Http\Middleware\RedirectToNonWwwMiddleware::class])->group(function () {
    // your actual routes
//    Route::get('/', function () {
//      return view('welcome');
//    });

    Route::get("/", \App\Actions\Central\Blog\Index::class);
    Route::get("/p/{slug}", \App\Actions\Central\Blog\View::class);
    Route::get("/sitemap.xml", \App\Actions\Central\Sitemap\Index::class);

    Route::get('/dashboard', function () {
      /**
       * @var \Illuminate\Contracts\Auth\StatefulGuard
       */
      $auth = auth();
      $tenant = Tenant::where("email", $auth->user()?->email)->firstOrFail();
      return redirect($tenant->impersonationUrl(1));
      // return view('dashboard');
    })->middleware(['auth' /*,'verified'*/])->name('dashboard');

    Route::middleware('auth')->group(function () {
    });


    require __DIR__ . '/auth.php';
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
