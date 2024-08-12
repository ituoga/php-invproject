<?php

namespace App\Views;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;


interface BaseViewInterface
{

    public function setModule(string $module): void;

    public function list(array $data): Factory|View;

    public function create(array $data): Factory|View;

    public function view(array $data): Factory|View;

    public function edit(array $data) : Factory|View;
    
    public function delete(array $data) : Factory|View;
}
