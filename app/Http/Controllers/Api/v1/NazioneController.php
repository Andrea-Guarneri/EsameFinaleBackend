<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioneCollection;
use App\Http\Resources\v1\NazioneResource;
use Illuminate\Http\Request;
use App\Models\Nazione;
use Illuminate\Support\Facades\Gate;

class NazioneController extends Controller
{
    // Restituisce tutti i valori
    public function index()
    {
        $continente = (request("continente") != null ? request("continente") : null);

        if ($continente != null) {
            $nazioni = Nazione::all()->where('continente', $continente);
        } else {
            $nazioni = Nazione::all();
        }

        return new NazioneCollection($nazioni);
    }

    // Memorizza un valore
    public function store(Request $request)
    {
        $dati = $request->validated();
        $nazione = Nazione::create($dati);
        return new Nazione($nazione);
    }

    // restituisce un valore
    public function show(Nazione $nazione)
    {

        $risorsa = new NazioneResource($nazione);

        return $risorsa;
    }

    // aggiornare un valore specifico
    public function update(Request $request, Nazione $nazione)
    {
        $dati = $request->validated();
        $nazione->fill($dati);
        $nazione->save();
    }

    // rimuovere un valore specifico
    public function destroy(Nazione $nazione)
    {
        $nazione->deleteOrFail();
        return response()->noContent();
    }
}
