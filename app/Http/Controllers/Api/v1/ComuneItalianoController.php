<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\ComuneItalianoCollection;
use App\Http\Resources\v1\ComuneItalianoResource;
use App\Http\Requests\v1\ComuneItalianoUpdateRequest;
use App\Http\Requests\v1\ComuneItalianoStoreRequest;
use App\Models\ComuneItaliano;

class ComuneItalianoController extends Controller
{
    // Restituisce tutti i valori
    public function index()
    {
        $risorsa = ComuneItaliano::all();
        $ritorno = new ComuneItalianoCollection(($risorsa));

        return $ritorno;
    }

    // Memorizza un valore
    public function store(ComuneItalianoStoreRequest $request)
    {
        $dati = $request->validated();
        $comuneItaliano = ComuneItaliano::create($dati);

        return new ComuneItalianoResource($comuneItaliano);
    }

    // restituisce un valore
    public function show(ComuneItaliano $comuneItaliano)
    {
        $risorsa = new ComuneItalianoResource($comuneItaliano);

        return $risorsa;
    }

    // aggiornare un valore specifico
    public function update(ComuneItalianoUpdateRequest $request, ComuneItaliano $comuneItaliano)
    {
        $dati = $request->validated();
        $comuneItaliano->fill($dati);
        $comuneItaliano->save();
        return new ComuneItalianoResource($comuneItaliano);
    }

    // rimuovere un valore specifico
    public function destroy(ComuneItaliano $comuneItaliano)
    {
        $comuneItaliano->deleteOrFail();
        return response()->noContent();
    }
}
