<?php

namespace App\Services;

interface BaseServiceInterface
{

    public function setModule(string $module);

    public function all();

    public function create();
    public function store($data);

    public function read($id);

    public function edit($id);
    
    public function update($id, $data);

    public function delete($id);

}
