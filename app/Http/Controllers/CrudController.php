<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseServiceInterface;
use Illuminate\Http\RedirectResponse;
// use Symfony\Component\HttpFoundation\Request;

use Illuminate\Http\Request;
use stdClass;

abstract class CrudController
{
    protected string $module;

    protected ?string $storeRequest;
    protected ?string $updateRequest;
    protected BaseServiceInterface $service;

    protected function setService(BaseServiceInterface $service): void
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

    public function store(Request $request): RedirectResponse
    {
        if ($this->storeRequest) {
            $request = app($this->storeRequest);
            return $this->service->store($request->validated());
        }
        return $this->service->store($request);
    }

    public function show($id = null)
    {
        return $this->service->read($id);
    }

    public function edit($id = null)
    {
        return $this->service->edit($id);
    }

    public function update(mixed $id = null, Request $request)
    {
        if ($this->updateRequest) {
            $request = app($this->updateRequest);
            return $this->service->update($id, $request->validated());
        }
        return $this->service->update($id, $request);
    }

    public function destroy(Request $request): RedirectResponse
    {
        return $this->service->delete($request);
    }
}
