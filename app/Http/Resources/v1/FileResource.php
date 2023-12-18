<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'idFile' => $this->idFile,
            'idRecord' => $this->idRecord,
            'tabella' => $this->tabella,
            'nome' => $this->nome,
            'size' => $this->size,
            'ext' => $this->ext,
            'descrizione' => $this->descrizione,
            'formato' => $this->formato
        ];
    }
}
