<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
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
            'idSerie' => $this->idSerie,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'totaleStagioni' => $this->totaleStagioni,
            'numeroEpisodio' => $this->numeroEpisodio,
            'regista' => $this->regista,
            'attori' => $this->attori,
            'annoInizio' => $this->annoInizio,
            'annoFine' => $this->annoFine,
            'srcImmagine' => $this->srcImmagine,
            'srcFilmato' => $this->srcFilmato,
            'srcBanner' => $this->srcBanner
        ];
    }
}
