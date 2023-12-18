<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->getCampi();
    }

    protected function getCampi()
    {
        return [
            'idCredito' => $this->idCredito,
            'idContatto' => $this->idContatto,
            'credito' => $this->credito
        ];
    }
}
