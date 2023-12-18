<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContattoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'data' => $this->collection->map(function ($contatto) {
                return [
                    'idContatto' => $contatto->idContatto,
                    'idStato' => $contatto->idStato,
                    'nome' => $contatto->nome,
                    'cognome' => $contatto->cognome,
                    'sesso' => $contatto->sesso,
                    'codiceFiscale' => $contatto->codiceFiscale,
                    'partitaIva' => $contatto->partitaIva,
                    'cittadinanza' => $contatto->cittadinanza,
                    'idNazione' => $contatto->idNazione,
                    'cittaNascita' => $contatto->cittaNascita,
                    'provinciaNascita' => $contatto->provinciaNascita,
                    'dataNascita' => $contatto->dataNascita,
                    'nazione' => $contatto->elencoContatti, // Nome do relacionamento
                    'filmHasContatto' => $contatto->elencoFilmHasContatto2, // Nome do relacionamento
                    'sessione' => $contatto->sessione, // Nome do relacionamento
                    'credito' => $contatto->credito, // Nome do relacionamento
                    'auth' => $contatto->auth, // Nome do relacionamento
                    'stato' => $contatto->elencoStati, // Nome do relacionamento
                    'gruppi' => $contatto->gruppi, // Nome do relacionamento
                    'indirizziContatto' => $contatto->elencoIndirizziContatto, // Nome do relacionamento
                    'passwords' => $contatto->elencoPassword, // Nome do relacionamento
                    'contattoHasContatto' => $contatto->contattoHasContatto, // Nome do relacionamento
                    'recapiti' => $contatto->elencoRecapiti, // Nome do relacionamento
                ];
            }),
        ];
    }
}
