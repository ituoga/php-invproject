<?php

namespace App\Services;

use App\Http\Requests\StoreInvoiceRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Http\Request;

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

    public function all()
    {
        $items = $this->repository->all();
        return $this->view->list(['items'=>$items]);
    }

    public function create()
    {
        return $this->view->create([]);
    }

    public function store($data)
    {
        $this->repository->create($data);
        return redirect()->to($this->redirectStore);
    }

    public function read($id)
    {
        $item = $this->repository->read($id);
        return $this->view->view(['item'=>$item]);
    }

    public function edit($id)
    {
        $item = $this->repository->read($id);
        return $this->view->edit(['item'=>$item]);
    }

    public function update($id, $request)
    {
        $data = $request;
        if($request instanceof Request){
            $data = $request->validated();
        }
        $item = $this->repository->read($id);
        $item->fill($data);
        $item->update();

        return redirect()->to($this->redirectUpdate);
    }

    public function delete($id)
    {
        $item = $this->repository->read($id);
        $item->delete();
        return redirect()->to($this->redirectDelete);
    }
}
