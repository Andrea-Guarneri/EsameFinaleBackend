<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodioResource extends JsonResource
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
            'idEpisodio' => $this->idEpisodio,
            'idSerie' => $this->idSerie,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'numeroStagione' => $this->numeroStagione,
            'numeroEpisodio' => $this->numeroEpisodio,
            'durata' => $this->durata,
            'anno' => $this->anno,
            'srcImmagine' => $this->idImmagine,
            'srcFilmato' => $this->idFilmato
        ];
    }
}
