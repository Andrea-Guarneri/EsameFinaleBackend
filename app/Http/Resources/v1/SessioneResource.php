<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessioneResource extends JsonResource
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
            'idSessione' => $this->idSessione,
            'idContatto' => $this->idContatto,
            'token' => $this->token,
            'inizioSessione' => $this->inizioSessione
        ];
    }
}
