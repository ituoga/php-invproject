<?php

namespace App\Services;

use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConfigService extends BaseService implements BaseServiceInterface
{

    public function __construct(
        BaseRepositoryInterface $repository,
        BaseViewInterface $view,
    ) {
        $this->repository = $repository;
        $this->view = $view;
    }

    /**
     * Returns model 
     * @param mixed $id
     * @return mixed
     */
    public function read($id = null)
    {
        return $this->repository->read($id);
    }

    /**
     * Creates or updates model
     * @param mixed $data
     * @return mixed
     */
    public function create($data = [])
    {
        $model = $this->repository->read(null);
        if (!empty($model)) {
            return $model->update($data);
        }
        $this->repository->create($data);
        return redirect()->to("/");
    }
}
