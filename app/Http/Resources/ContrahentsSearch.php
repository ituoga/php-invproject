<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 
 * @property mixed $name
 * @property mixed $code
 * @property mixed $email
 * @property mixed $vat
 * @property mixed $phone
 * @property mixed $address
 * @property mixed $country
 * 
 */
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
