<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $price
 * @property mixed $quantity
 * @property mixed $unit
 * @property mixed $vat
 */
class ProductSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->withoutWrapping();

        return [
            'id' => $this->id,
            'label' => $this->name,
            'value' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'vat' => $this->vat
        ];
    }
}
