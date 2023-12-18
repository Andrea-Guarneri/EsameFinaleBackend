<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContattoResource extends JsonResource
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
            'idContatto' => $this->idContatto,
            'idStato' => $this->idStato,
            'nome' => $this-> nome,
            'cognome' => $this->cognome,
            'sesso' => $this-> sesso,
            'codiceFiscale' => $this->codiceFiscale,
            'partitaIva' => $this-> partitaIva,
            'cittadinanza' => $this->cittadinanza,
            'idNazioneNascita' => $this-> idNazioneNascita,
            'cittaNascita' => $this->cittaNascita,
            'provinciaNascita' => $this-> provinciaNascita,
        ];
    }
}
