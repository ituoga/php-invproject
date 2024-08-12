<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContrahentRequest;
use App\Http\Requests\UpdateContrahentRequest;
use App\Models\Contrahent;
use App\Services\BaseServiceInterface;
use Illuminate\Support\Facades\Request;

class ContrahentController extends Controller
{

    protected string $module = "contrahents";

    public function __construct(
        BaseServiceInterface $service,
    ) {
        $this->setService($service);
    }

    public function store($_data = null)
    {
        $request = app(StoreContrahentRequest::class);
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('contrahents.index');
    }

    public function update($id = null, $_data = null)
    {
        $request = app(UpdateContrahentRequest::class);
        $data = $request->validated();
        $this->service->update($data, $id);
        return redirect()->route('contrahents.index');
    }
}
