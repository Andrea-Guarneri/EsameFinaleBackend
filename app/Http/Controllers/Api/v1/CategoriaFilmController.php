<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoriaFilmStoreRequest;
use App\Http\Requests\v1\CategoriaFilmUpdateRequest;
use App\Http\Resources\v1\CategoriaFilmCollection;
use App\Http\Resources\v1\CategoriaFilmResource;
use App\Models\CategoriaFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriaFilm = null;
        if (Gate::allows('leggere')) {
            $categoriaFilm = CategoriaFilm::all();
            return new CategoriaFilmCollection($categoriaFilm);
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
                $idCategoriaFilm = CategoriaFilm::create($data);
                return new CategoriaFilmResource($idCategoriaFilm);
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
    public function show(CategoriaFilm $categoriaFilm)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new CategoriaFilmResource($categoriaFilm);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaFilm $categoriaFilm)
    {
        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $categoriaFilm->fill($data);
            $categoriaFilm->save();
            return new CategoriaFilmResource($categoriaFilm);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaFilm $categoriaFilm)
    {
        if (Gate::allows('eliminare')) {
            $categoriaFilm->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
