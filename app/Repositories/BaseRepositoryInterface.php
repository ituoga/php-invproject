<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{

    public function all();

    public function create($data);

    public function read($id);

    public function update($id, $data);

    public function delete($id);

}
