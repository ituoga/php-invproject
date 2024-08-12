<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\InvoiceLine;
use Illuminate\Support\Facades\DB;

/**
 * 
 * @property Invoice $model
 */
class InvoiceRepository extends BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        Invoice $model,
        public InvoiceLine $lineModel,
    ){
        $this->model = $model;
    }

    public function create($data)
    {
        $model = DB::transaction(function () use ($data) {
            $lines = $data['lines'];
            unset($data['lines']);
            $model = $this->model->create($data);
            $model->lines()->createMany($lines);
            return $model;
        });
        return $model;
    }
    
}
