<?php

namespace App\Services;

use App\Http\Requests\StoreInvoiceRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;

abstract class BaseService implements BaseServiceInterface
{
    protected string $module;
    protected string $prefix = "";
    protected string $redirectStore = "/";
    protected string $redirectUpdate = "/";
    protected string $redirectDelete = "/";

    protected BaseRepositoryInterface $repository;

    protected BaseViewInterface $view;

    public function setModule(string $module)
    {
        $this->view->setModule($module);
    }

    public function all(): Factory|View
    {
        $items = $this->repository->all();
        return $this->view->list(['items' => $items]);
    }

    public function create($data=[]): mixed
    {
        return $this->view->create([]);
    }

    public function store($data): RedirectResponse
    {
        $this->repository->create($data);
        return redirect()->to($this->redirectStore);
    }

    public function read($id): mixed
    {
        $item = $this->repository->read($id);
        return $this->view->view(['item' => $item]);
    }

    public function edit($id): Factory|View
    {
        $item = $this->repository->read($id);
        return $this->view->edit(['item' => $item]);
    }

    public function update($id, $request): RedirectResponse
    {
        $data = $request;
        if ($request instanceof Request) {
            if(method_exists($request, 'validated')) {
                $data = $request->validated();
            } else {
                $data = $request->all();
            }
        }
        // $item = $this->repository->read($id);
        // $item->fill($data);
        // $item->update();
        $this->repository->update($id, $data);

        return redirect()->to($this->redirectUpdate);
    }

    public function delete($id): RedirectResponse
    {
        $item = $this->repository->read($id);
        $item->delete();
        return redirect()->to($this->redirectDelete);
    }
}
