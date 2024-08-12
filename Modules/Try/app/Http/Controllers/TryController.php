<?php

namespace Modules\Try\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Invoice\IndexController;
use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseServiceInterface;
use App\Services\InvoicesService;
use App\Views\BaseViewInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TryController extends InvoicesService implements BaseServiceInterface
{
    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view,
    ){
        $this->repository = $repository;
        $this->view = $view;
    }
    
    public function all()
    {
        return view("empty");
    }
}
