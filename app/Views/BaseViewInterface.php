<?php

namespace App\Views;

interface BaseViewInterface
{

    public function setModule(string $module);

    public function list($data);

    public function create($data);

    public function view($data);

    public function edit($data);
    
    public function delete($data);
}
