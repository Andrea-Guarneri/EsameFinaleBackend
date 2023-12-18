<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TraduzioneCustomResource extends JsonResource
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
            'idTraduzione' => $this->idTraduzione,
            'idLingua' => $this->idLingua,
            'chiave' => $this->chiave,
            'valore' => $this->valore
        ];
    }
}
