<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TipologiaIndirizzoCollection extends ResourceCollection
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
    }

    //protected----------------------------------------
    // ------------------------------------------------
    protected function getCampi($item)
    {
        return [
            'idTipologiaIndirizzo' => $item["idTipologiaIndirizzo"],
            'nome' => $item["nome"]
        ];
    }

}
