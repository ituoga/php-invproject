<?php

namespace App\Services;
use App\Enums\InvoiceTypeEnum;
use App\Models\Invoice;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class InvoicesService.
 */
class InvoicesService extends BaseService implements BaseServiceInterface
{
    protected string $redirectStore = "/invoices";
    protected string $redirectUpdate = "/invoices";
    protected string $redirectDelete = "/invoices";
    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view,
    ){
        $this->repository = $repository;
        $this->view = $view;
    }

    public function read($id): mixed
    {
        $item = $this->repository->read($id);
        $config = app(ConfigService::class)->read();
        return $this->view->view(['item' => $item, 'config' => $config]);
    }
    public function create($data=[]): Factory|View
    {
        $config = app(ConfigService::class)->read();
        return $this->view->create([
            'config' => $config,
            'type' => session()->get("invoice.type"),
        ]);
    }

    public function edit($id): Factory|View
    {
        Auth::loginUsingId(1);
        $config = app(ConfigService::class)->read();
        $item  = $this->repository->read($id);
        return $this->view->edit([
            'config' =>  $config,
            'item' => $item,
        ]);
    }

    public function store($data): RedirectResponse
    {
        $this->repository->create($data);
        /**
         * @var ConfigService $service
         */
        $service = app(ConfigService::class);

        switch(session()->get("invoice.type")) {
            case InvoiceTypeEnum::Preliminary->value:
                $service->incrementPreInvoiceNumber();
                break;
            case InvoiceTypeEnum::Credit->value:
                $service->incrementCreditInvoiceNumber();
                break;
            default:
                $service->incrementDebitInvoiceNumber();
                break;
        }
        session()->forget("invoice.type");
        return redirect()->to($this->redirectStore);
    }

}
