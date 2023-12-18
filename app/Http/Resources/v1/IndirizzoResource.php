<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class IndirizzoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        // return parent::toArray($request);
        return $this->getCampi();

    }
    //protected----------------------------------------
    // ------------------------------------------------
    protected function getCampi()
    {
        return [
            'idIndirizzo' => $this->idIndirizzo,
            'idTipologiaIndirizzo' => $this->idTipologiaIndirizzo,
            'idNazione' => $this->idNazione,
            'comune' => $this->comune,
            'localita' => $this->localita,
            'cap' => $this->cap,
            'indirizzo' => $this->indirizzo,
            'civico' => $this->civico
        ];
    }
}
