<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoriaSerieStoreRequest;
use App\Http\Requests\v1\CategoriaSerieUpdateRequest;
use App\Http\Resources\v1\CategoriaSerieCollection;
use App\Http\Resources\v1\CategoriaSerieResource;
use App\Models\CategoriaSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriaSerie = null;
        if (Gate::allows('leggere')) {
            $categoriaSerie = CategoriaSerie::all();
            return new CategoriaSerieCollection($categoriaSerie);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $idCategoriaSerie = CategoriaSerie::create($data);
                return new CategoriaSerieResource($idCategoriaSerie);
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
    public function show(CategoriaSerie $categoriaSerie)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new CategoriaSerieResource($categoriaSerie);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaSerie $categoriaSerie)
    {
        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $categoriaSerie->fill($data);
            $categoriaSerie->save();
            return new CategoriaSerieResource($categoriaSerie);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaSerie $categoriaSerie)
    {
        if (Gate::allows('eliminare')) {
            $categoriaSerie->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
