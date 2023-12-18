<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinciaResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->getCampi();
    }

    protected function getCampi()
    {
        return [
            'idProvincia' => $this->idProvincia,
            'nome' => $this->nome,
        ];
    }
}
