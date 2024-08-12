<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        Product $model
    ){
        $this->model = $model;
    }
    
}
