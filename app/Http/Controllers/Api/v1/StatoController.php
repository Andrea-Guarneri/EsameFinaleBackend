<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stato;
use App\Http\Resources\v1\StatoCollection;
use App\Http\Resources\v1\StatoResource;
use App\Http\Requests\v1\StatoUpdateRequest;
use App\Http\Requests\v1\StatoStoreRequest;
use Illuminate\Support\Facades\Gate;

class StatoController extends Controller
{
    // Restituisce tutti i valori
    public function index()
    {
        $risorsa = Stato::all();
        $ritorno = new StatoCollection(($risorsa));

        return $ritorno;
    }

    // Memorizza un valore
    public function store(StatoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $stato = Stato::create($data);
                return new StatoResource($stato);
            } else {
                abort(404, 'PE_0008');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    // restituisce un valore
    public function show(Stato $stato)
    {
        $risorsa = new StatoResource($stato);

        return $risorsa;
    }

    // aggiornare un valore specifico
    public function update(StatoUpdateRequest $request, Stato $stato)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $stato->fill($data);
                $stato->save();
                return new StatoResource($stato);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    // rimuovere un valore specifico
    public function destroy(Stato $stato)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $stato->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0005');
            }
        }
    }
}
