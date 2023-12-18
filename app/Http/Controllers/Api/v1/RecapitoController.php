<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recapito;
use App\Http\Resources\v1\RecapitoCollection;
use App\Http\Resources\v1\RecapitoResource;
use App\Http\Requests\v1\RecapitoStoreRequest;
use App\Http\Requests\v1\RecapitoUpdateRequest;
use Illuminate\Support\Facades\Gate;

class RecapitoController extends Controller

{
    // Restituisce tutti i valori
    public function index()
    {
        $indirizzo = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $idRecapito = Recapito::all();
                if (request("idContatto") != null) {
                    $idRecapito = $idRecapito->where("idContatto", request("idContatto"));
                }
                if (request("idTipologiaRecapito") != null) {
                    $idRecapito = $idRecapito->where("idTipologiaRecapito", request("idTipologiaRecapito"));
                }

                return new RecapitoCollection($idRecapito);
            } else {
                abort(403, '403');
            }
        }
    }

    // Memorizza un valore
    public function store(RecapitoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $dati = $request->validated();
            $recapito = Recapito::create($dati);
            return new RecapitoResource($recapito);
        } else {
            abort(403, '403');
        }
    }

    // restituisce un valore
    public function show(Recapito $recapito)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new RecapitoResource($recapito);
            return $risorsa;
        } else {
            abort(403, '403');
        }
    }

    // aggiornare un valore specifico
    public function update(RecapitoUpdateRequest $request, Recapito $recapito)
    {
        if (Gate::allows('aggiornare')) {
            $dati = $request->validated();
            $recapito->fill($dati);
            $recapito->save();
            return new RecapitoResource($recapito);
        } else {
            abort(403, '403');
        }
    }


    //rimuovere un valore specifico
    public function destroy(Recapito $recapito)
    {
        if (Gate::allows('eliminare')) {
            $recapito->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, '403');
        }
    }
}
