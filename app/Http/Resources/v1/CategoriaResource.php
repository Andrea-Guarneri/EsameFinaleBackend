<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
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
            'idCategoria' => $this->idCategoria,
            'descrizione' => $this->descrizione,
            'nome' => $this->nome,
            'watch' => $this->watch,
            'srcImmagine' => $this->srcImmagine
        ];
    }
}
