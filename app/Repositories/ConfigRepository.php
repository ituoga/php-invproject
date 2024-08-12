<?php

namespace App\Repositories;

use App\Models\Config;

class ConfigRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        Config $model
    ){
        $this->model = $model;
    }

    public function read($id)
    {
        return $this->model->first();
    }
}
