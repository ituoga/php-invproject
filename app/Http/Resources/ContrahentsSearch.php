<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContrahentsSearch extends JsonResource
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
            'label' => $this->name,
            'value' => $this->name,
            'code' => $this->code,
            'email' => $this->email,
            'vat' => $this->vat,
            'phone' => $this->phone,
            'address' => $this->address,
            'zountry' => $this->country,

        ];
    }

    
}
