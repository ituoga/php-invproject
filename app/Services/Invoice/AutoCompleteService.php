<?php

namespace App\Services\Invoice;

use App\Http\Resources\ContrahentsSearch;
use App\Models\Contrahent;

/**
 * Class AutoCompleteService.
 */
class AutoCompleteService
{
    public function __construct(
        protected Contrahent $model,
    ) {}

    public function search(?string $q)
    {
        $data = $this->model
            ->where('name', 'like', "%$q%")
            ->orWhere('code', 'like', "%$q%")
            ->orWhere('vat', 'like', "%$q%")
            ->get();
        return ContrahentsSearch::collection($data);
    }

    public function searchByName(string $q)
    {
        return $this->model->where('name', 'like', "%$q%")->get();
    }

    public function searchByCode(string $q)
    {
        return $this->model->where('code', 'like', "$q%")->get();
    }

    public function searchByVat(string $q)
    {
        return $this->model->where('vat', 'like', "$q%")->get();
    }

}
