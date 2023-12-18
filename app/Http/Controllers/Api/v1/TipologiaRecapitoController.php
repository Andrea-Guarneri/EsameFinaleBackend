<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\TipologiaRecapito;
use App\Http\Resources\v1\TipologiaRecapitoCollection;
use App\Http\Resources\v1\TipologiaRecapitoResource;
use App\Http\Requests\v1\TipologiaRecapitoStoreRequest;
use App\Http\Requests\v1\TipologiaRecapitoUpdateRequest;
use App\Http\Resources\v1\TipologiaRecapitoCompletoCollection;
use App\Http\Resources\v1\TipologiaRecapitoCompletoResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipologiaRecapitoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return TipoRecapito::all();
        $tipologiaRecapito = TipologiaRecapito::all();
        $risorsa = null;

        // dd(request('tipo')); // uso funzione dd che ci visualizza che visualizza i dati e poi muore
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipologiaRecapitoCompletoCollection($tipologiaRecapito);
        } else {
            $risorsa = new TipologiaRecapitoCollection($tipologiaRecapito);
        }
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipologiaRecapitoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $dati = $request->validated();
                $idTipoRecapito = TipologiaRecapito::create($dati);
                return new TipologiaRecapitoResource($idTipoRecapito);
            } else {
                abort(403, 'PE_0006');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipologiaRecapito $tipologiaRecapito)
    {
        $risorsa = null;
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipologiaRecapitoCompletoResource($tipologiaRecapito);
        } else {
            $risorsa = new TipologiaRecapitoResource($tipologiaRecapito);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipologiaRecapitoUpdateRequest $request, TipologiaRecapito $tipologiaRecapito)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {
                $dati = $request->validated();
                $tipologiaRecapito->fill($dati);
                $tipologiaRecapito->save();
                return new TipologiaRecapitoResource($tipologiaRecapito);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipologiaRecapito $tipologiaRecapito)
    {
        $tipologiaRecapito->deleteOrFail();
        return response()->noContent();
    }
}
