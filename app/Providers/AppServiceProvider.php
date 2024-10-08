<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Config;
use App\Http\Controllers\ContrahentController;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\ConfigRepository;
use App\Repositories\ContrahentRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\ProductRepository;
use App\Services\BaseService;
use App\Services\BaseServiceInterface;
use App\Services\ConfigService;
use App\Services\ContrahentService;
use App\Services\InvoicesService;
use App\Services\ProductService;
use App\Services\ProfileService;
use App\Views\BaseViewInterface;
use App\Views\ConfigView;
use App\Views\ContrahentView;
use App\Views\InvoiceView;
use App\Views\ProductView;
use App\Views\ProfileView;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Lorisleiva\Actions\Facades\Actions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


        $this->provide(
            ProductController::class,
            ProductService::class,
            ProductRepository::class,
            ProductView::class,
        );

        $this->provide(Invoice\IndexController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\CreateController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\ReadController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\UpdateController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\DeleteController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\StoreController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);
        $this->provide(Invoice\EditController::class, InvoicesService::class, InvoiceRepository::class, InvoiceView::class);

        $this->provide(Config\StoreController::class, ConfigService::class, ConfigRepository::class,  ConfigView::class,);

        app()->when(ProfileService::class)->needs(BaseServiceInterface::class)->give(ConfigService::class);

        $this->provide(
            ProfileController::class,
            ProfileService::class,
            null,
            ProfileView::class,
        );


        $this->provide(
            ContrahentController::class,
            ContrahentService::class,
            ContrahentRepository::class,
            ContrahentView::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $this->trans();

        if ($this->app->runningInConsole()) {
            Actions::registerCommands();
        }

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        View::composer('layouts.app', function ($view) {

            /**
             * @var \Illuminate\Contracts\Auth\StatefulGuard $auth
             */
            $auth = auth();
            $user = $auth->user();
            $view->with('current_user', $user);
        });
    }

    private function provide(
        string $controller,
        string $service,
        ?string $repository = null,
        ?string $view = null,
    ): void {

        if (!empty($repository)) {
            app()->when($service)->needs(BaseRepositoryInterface::class)->give($repository);
        }
        if (!empty($view)) {
            app()->when($service)->needs(BaseViewInterface::class)->give($view);
        }

        app()->when($controller)->needs(BaseServiceInterface::class)->give($service);
    }
}
