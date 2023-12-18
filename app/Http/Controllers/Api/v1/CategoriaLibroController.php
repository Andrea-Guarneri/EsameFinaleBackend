<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoriaLibroStoreRequest;
use App\Http\Requests\v1\CategoriaLibroUpdateRequest;
use App\Http\Resources\v1\CategoriaLibroCollection;
use App\Http\Resources\v1\CategoriaLibroResource;
use App\Models\CategoriaLibro;
use Illuminate\Http\Request;

class CategoriaLibroController extends Controller
{
    // Restituisce tutti i valori
    public function index()
    {
        $risorsa = CategoriaLibro::all();
        $ritorno = new CategoriaLibroCollection(($risorsa));

        return $ritorno;
    }

    // Memorizza un valore
    public function store(CategoriaLibroStoreRequest $request)
    {
        $dati = $request->validated();
        $categoriaLibro = CategoriaLibro::create($dati);

        return new CategoriaLibroResource($categoriaLibro);
    }

    // restituisce un valore
    public function show(CategoriaLibro $categoriaLibro)
    {
        $risorsa = new CategoriaLibroResource($categoriaLibro);

        return $risorsa;
    }

    // aggiornare un valore specifico
    public function update(CategoriaLibroUpdateRequest $request, CategoriaLibro $categoriaLibro)
    {
        $dati = $request->validated();
        $categoriaLibro->fill($dati);
        $categoriaLibro->save();
        return new CategoriaLibroResource($categoriaLibro);
    }

    // rimuovere un valore specifico
    public function destroy(CategoriaLibro $categoriaLibro)
    {
        $categoriaLibro->deleteOrFail();
        return response()->noContent();
    }
}
