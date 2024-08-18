<?php

namespace App\Services;

use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ConfigService extends BaseService implements BaseServiceInterface
{

    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view,
    ) {
        $this->repository = $repository;
        $this->view = $view;
    }

    /**
     * Returns model
     * @param mixed $id
     * @return Factory|View
     */
    public function read($id = null): mixed
    {
        $data =  $this->repository->read($id);
        return $data;
        // return $this->view->view(['item'=>$data]);
    }

    /**
     * Creates or updates model
     * @param mixed $data
     * @return RedirectResponse
     */
    public function create($data = []): RedirectResponse
    {
        $model = $this->repository->read(null);
        if (!empty($model)) {
            $model->update($data);
            return redirect()->to("/");
        }
        $this->repository->create($data);
        return redirect()->to("/");
    }

    public function incrementDebitInvoiceNumber()
    {
        $model = app(ConfigService::class)->read();
        //@phpstan-ignore-next-line
        $data['invoice_number_deb'] = $model->invoice_number_deb + 1;
        $this->create($data);
    }

    public function incrementPreInvoiceNumber()
    {
        $model = app(ConfigService::class)->read();
        //@phpstan-ignore-next-line
        $data['invoice_number_pre'] = $model->invoice_number_pre + 1;
        $this->create($data);
    }
    public function incrementCreditInvoiceNumber()
    {
        $model = app(ConfigService::class)->read();
        //@phpstan-ignore-next-line
        $data['invoice_number_cre'] = $model->invoice_number_cre + 1;
        $this->create($data);
    }
}

