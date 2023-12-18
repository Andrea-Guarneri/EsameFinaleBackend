<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Http\Resources\v1\CreditoCollection;
use App\Http\Resources\v1\CreditoResource;
use App\Http\Requests\v1\CreditoStoreRequest;
use App\Http\Requests\v1\CreditoUpdateRequest;
use Illuminate\Support\Facades\Gate;

class CreditoController extends Controller
{
    // Restituisce tutti i valori se sei amministratore
    public function index()
    {
        $idCredito = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $idCredito = Credito::all();
            } else {
                $idCredito = Credito::all()->where('watch', 1);
            }
            return new CreditoCollection($idCredito);
        } else {
            abort(403, 'PE_0001');
        }
    }

    // Memorizza un valore
    public function store(CreditoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $idCredito = Credito::create($data);
                return new CreditoResource($idCredito);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    // restituisce un valore
    public function show(Credito $credito)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new CreditoResource($credito);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }


    //aggiornare un valore specifico
    public function update(CreditoUpdateRequest $request, Credito  $credito)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {
                $dati = $request->validated();
                $credito->fill($dati);
                $credito->save();
                return new CreditoResource($credito);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credito $credito)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $credito->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }
}
