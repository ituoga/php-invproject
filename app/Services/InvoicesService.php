<?php

namespace App\Services;
use App\Models\Invoice;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;

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
}
