<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NazioneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->getCampi();
    }

    //----Protected------------------------------
    //-------------------------------------------

    protected function getCampi()
    {
        return [
            'idNazione' => $this->idNazione,
            'nome' => $this->nome,
            "iso3" => $this->iso3
        ];
    }
}
