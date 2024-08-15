<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContrahentRequest;
use App\Http\Requests\UpdateContrahentRequest;
use App\Models\Contrahent;
use App\Services\BaseServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContrahentController extends CrudController
{

    protected string $module = "contrahents";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }

    public function store(Request $request): RedirectResponse
    {
        $request = app(StoreContrahentRequest::class);
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('contrahents.index');
    }

    public function update(Request $request, mixed $id = null): RedirectResponse
    {
        $request = app(UpdateContrahentRequest::class);
        $data = $request->validated();
        $this->service->update($data, $id);
        return redirect()->route('contrahents.index');
    }
}
