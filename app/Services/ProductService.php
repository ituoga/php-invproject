<?php

namespace App\Services;

use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;

/**
 * Class ProductService.
 */
class ProductService extends BaseService implements BaseServiceInterface
{

    protected string $redirectStore = "/products";
    protected string $redirectUpdate = "/products";
    protected string $redirectDelete = "/products";
    
    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view,
    ){
        $this->repository = $repository;
        $this->view = $view;
    }
}
