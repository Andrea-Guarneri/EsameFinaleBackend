<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Http\Resources\v1\CategoriaCollection;
use App\Http\Resources\v1\CategoriaResource;
use App\Http\Requests\v1\CategoriaStoreRequest;
use App\Http\Requests\v1\CategoriaUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = null;
        if (Gate::allows('leggere')) {
            $categoria = Categoria::all();
            return new CategoriaCollection($categoria);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $idCategoria = Categoria::create($data);
                return new CategoriaResource($idCategoria);
            } else {
                abort(403, 'PE_0006');
            }
        } else {
            abort(403, 'PE_0008');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new CategoriaResource($categoria);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $categoria->fill($data);
            $categoria->save();
            return new CategoriaResource($categoria);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if (Gate::allows('eliminare')) {
            $categoria->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
