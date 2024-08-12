<?php

namespace App\Http\Controllers;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseServiceInterface;
// use Symfony\Component\HttpFoundation\Request;

use Illuminate\Support\Facades\Request;

abstract class Controller
{
    protected string $module;
 
    protected ?string $storeRequest;
    protected ?string $updateRequest;
    protected BaseServiceInterface $service;

    protected function setService(BaseServiceInterface $service)
    {
        $this->service = $service;
        $this->service->setModule($this->module);
    }

    public function index()
    {
        return $this->service->all();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(Request $request)
    {
        if ($this->storeRequest) {
            $request = app($this->storeRequest);
            return $this->service->store($request->validated());
        }
        return $this->service->store($request);
    }

    public function show($id=null)
    {
        return $this->service->read($id);
    }

    public function edit($id=null)
    {
        return $this->service->edit($id);
    }

    public function update($id=null,Request $request)
    {
        if ($this->updateRequest) {
            $request = app($this->updateRequest);
            return $this->service->update($id, $request->validated());
        }
        return $this->service->update($id, $request);
    }

    public function destroy($id=null)
    {
        return $this->service->delete($id);
    }
}
