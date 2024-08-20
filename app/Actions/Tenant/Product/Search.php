<?php

namespace App\Actions\Tenant\Product;

use App\Http\Resources\ProductSearchResource;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class Search
{
    use AsAction;

    public function handle()
    {
        return ProductSearchResource::collection(Product::where("name", "like", "%" . request()->term .'%')->get());
    }
}
