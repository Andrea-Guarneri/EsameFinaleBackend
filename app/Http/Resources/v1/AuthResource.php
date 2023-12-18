<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'idAuth' => $this->idAuth,
            'idContatto' => $this-> idContatto,
            'user' => $this-> user,
            'sfida' => $this-> sfida,
            'secretJWT' => $this-> secretJWT,
            'inizioSfida' => $this-> inizioSfida,
        ];
    }
}
