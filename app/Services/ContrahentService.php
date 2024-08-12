<?php

namespace App\Services;

use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Http\Request;

class ContrahentService extends BaseService implements BaseServiceInterface
{


    protected string $redirectStore = "/contrahents";
    protected string $redirectUpdate = "/contrahents";
    protected string $redirectDelete = "/contrahents";

    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view
    ) {
        $this->repository = ($repository);
        $this->view = ($view);
    }
}
