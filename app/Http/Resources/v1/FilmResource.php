<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'idFilm' => $this->idFilm,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'durata' => $this->durata,
            'regista' => $this->regista,
            'attori' => $this->attori,
            'anno' => $this->anno,
            'srcImmagine' => $this->srcImmagine,
            'srcFilmato' => $this->srcFilmato,
            'srcBanner' => $this->srcBanner
        ];
    }
}
