<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NazioneCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        $tmp = parent::toArray($request);
        $tmp = array_map(array($this, 'getCampi'), $tmp);
        return $tmp;

        // return $this->collection;
    }

    //---Protected----------------------------------------------
    //----------------------------------------------------------
    protected function getCampi($item)
    {
        return [
            'idNazione' => $item["idNazione"],
            'nome' => $item["nome"],
            'iso3' => $item["iso3"]
        ];
    }
}
