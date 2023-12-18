<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComuneItalianoResource extends JsonResource
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
            'idComuneItaliano' => $this->idComuneItaliano,
            'nome' => $this-> nome,
            'regione' => $this->regione,
            'provincia' => $this-> provincia,
            'metropolitana' => $this->metropolitana,
            'siglaAutomobilistica' => $this-> siglaAutomobilistica,
            'codiceCatastale' => $this->codicecatastale,
            'multicap' => $this-> multicap,
            'capoluogo' => $this->capoluogo,
            'cap' => $this-> cap,
            'capFine' => $this->capFine,
            'capInizio' => $this-> capInizio
        ];
    }
}
