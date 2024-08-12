<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\BaseServiceInterface;
use Illuminate\Contracts\Cache\Store;

class ProductController extends CrudController
{
    protected string $module = "products";

    protected ?string $storeRequest = StoreProductRequest::class;
    protected ?string $updateRequest = UpdateProductRequest::class;

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }
}
