<?php

namespace App\Views;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;

abstract class BaseView implements BaseViewInterface
{
    protected string $module;

    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    public function list(array $data): Factory|View
    {
        return view($this->module . '.index', $data);
    }

    public function create(array $data): Factory|View
    {
        return view($this->module . '.create', $data);
    }

    public function view(array $data): Factory|View
    {
        return view($this->module . '.view', $data);
    }

    public function edit(array $data): Factory|View
    {
        return view($this->module . '.edit', $data);
    }

    public function delete(array $data): Factory|View
    {
        return view($this->module . '.delete', $data);
    }
}
