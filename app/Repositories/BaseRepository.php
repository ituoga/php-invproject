<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function all()
    {
        return $this->model->all();
    }

    public function create(mixed $data)
    {
        return $this->model->create($data);
    }

    public function read($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $request)
    {
        $item = $this->model->find($id);
        $item->fill($request->validated());
        return $item->update();

    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

}
