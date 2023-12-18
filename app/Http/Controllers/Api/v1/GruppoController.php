<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gruppo;
use App\Http\Resources\v1\GruppoCollection;
use App\Http\Resources\v1\GruppoResource;
use App\Http\Requests\v1\GruppoStoreRequest;
use App\Http\Requests\v1\GruppoUpdateRequest;
use Illuminate\Support\Facades\Gate;

class GruppoController extends Controller
{
    // Restituisce tutti i gruppi
    public function index()
    {
        $risorsa = Gruppo::all();
        $ritorno = new GruppoCollection(($risorsa));

        return $ritorno;
    }

    // Controlla l'autorizzazione dell'utente, se è un amministratore, può memorizzare una risorsa
    public function store(GruppoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $idGruppo = Gruppo::create($data);
                return new GruppoResource($idGruppo);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    // Mostra una risorsa specifica
    public function show(Gruppo $gruppo)
    {
        $risorsa = new GruppoResource($gruppo);

        return $risorsa;
    }

    // Aggiorna una risorsa specifica
    public function update(GruppoUpdateRequest $request, Gruppo $gruppo)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {
                $dati = $request->validated();
                $gruppo->fill($dati);
                $gruppo->save();
                return new GruppoResource($gruppo);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    // Rimuovi una funzione specifica
    public function destroy(Gruppo $gruppo)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $gruppo->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }
}
