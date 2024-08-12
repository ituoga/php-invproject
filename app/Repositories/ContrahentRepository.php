<?php

namespace App\Repositories;

use App\Models\Contrahent;

class ContrahentRepository extends BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        Contrahent $model
    ){
        $this->model = $model;
    }
    
}
