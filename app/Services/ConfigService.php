<?php

namespace App\Services;

use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\BaseRepositoryInterface;
use App\Views\BaseViewInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @return Factory|View
     */
    public function read($id = null): Factory|View
    {
        return $this->repository->read($id);
    }

    /**
     * Creates or updates model
     * @param mixed $data
     * @return RedirectResponse
     */
    public function store($data = []): RedirectResponse
    {
        $model = $this->repository->read(null);
        if (!empty($model)) {
            return $model->update($data);
        }
        $this->repository->create($data);
        return redirect()->to("/");
    }
}
