<?php

namespace App\Views;

abstract class BaseView implements BaseViewInterface
{
    protected string $module;

    public function setModule(string $module)
    {
        $this->module = $module;
    }

    public function list($data)
    {
        return view($this->module . '.index', $data);
    }

    public function create($data)
    {
        return view($this->module . '.create', $data);
    }

    public function view($data)
    {
        return view($this->module . '.view', $data);
    }

    public function edit($data)
    {
        return view($this->module . '.edit', $data);
    }

    public function delete($data)
    {
        return view($this->module . '.delete', $data);
    }
}
