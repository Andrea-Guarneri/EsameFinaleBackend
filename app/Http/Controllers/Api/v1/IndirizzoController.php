<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\IndirizzoStoreRequest;
use App\Http\Requests\v1\IndirizzoUpdateRequest;
use App\Http\Requests\v1IndirizzoStoreRequest;
use App\Http\Resources\v1\IndirizzoCollection;
use App\Http\Resources\v1\IndirizzoResource;
use App\Models\Indirizzo;
use Illuminate\Http\Request;
use App\Http\Resources\v1\IndirizzoCompletoResource;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class IndirizzoController extends Controller
{

    // in base al permesso dell'utente, e restituisce l'id del contatto o la tipologiaIndirizzo
    public function index()
    {
        $indirizzo = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $indirizzo = Indirizzo::all();
                if (request("idContatto") != null) {
                    $indirizzo = $indirizzo->where("idContatto", request("idContatto"));
                }
                if (request("idTipologiaIndirizzo") != null) {
                    $indirizzo = $indirizzo->where("idTipologiaIndirizzo", request("idTipologiaIndirizzo"));
                }

                return new IndirizzoCollection($indirizzo);
            } else {
                abort(403, '403');
            }
        }
    }

    // memorizza un valore
    public function store(IndirizzoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $dati = $request->validated();
            $idIndirizzo = Indirizzo::create($dati);
            return new IndirizzoResource($idIndirizzo);
        } else {
            abort(403, '403');
        }
    }

    // memorizza un valore
    public function show(Indirizzo $indirizzo)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new IndirizzoResource($indirizzo);
            return $risorsa;
        } else {
            abort(403, '403');
        }
    }


    // aggiornare un valore specifico
    public function update(IndirizzoUpdateRequest $request, Indirizzo $indirizzo)
    {
        if (Gate::allows('aggiornare')) {
            $dati = $request->validated();
            $indirizzo->fill($dati);
            $indirizzo->save();
            return new IndirizzoResource($indirizzo);
        } else {
            abort(403, '403');
        }
    }

    // rimuovere un valore specifico
    public function destroy(Indirizzo $indirizzo)
    {
        if (Gate::allows('eliminare')) {
            $indirizzo->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, '403');
        }
    }
}
