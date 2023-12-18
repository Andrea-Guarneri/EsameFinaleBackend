<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\EpisodioStoreRequest;
use App\Http\Requests\v1\EpisodioUpdateRequest;
use App\Http\Resources\v1\EpisodioCollection;
use App\Http\Resources\v1\EpisodioResource;
use App\Models\Episodio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EpisodioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Gate::allows("leggere")) {
            $titolo = (request("titolo") != null) ? request("titolo") : null;
            if ($titolo != null) {
                $episodio = Episodio::all()->where('titolo', $titolo);
            } else {
                $episodio = Episodio::all();
            }
            return new EpisodioCollection($episodio);
        } else {
            abort(403, 'PE_0001');
        }
    }
    /**
     * Display a listing of the resource from continente.
     *
     * @param char $idCategory
     * @return JsonResource
     */
    public function indexSerie($serie)
    {
        if (Gate::allows('leggere')) {

            $episodioSerie = Episodio::join('serie_tv', 'episodio.idEpisodio', '=', 'serie_tv.idEpisodio')
                ->where('serie_tv.idSerie', $serie)
                ->get();

            return new EpisodioCollection($episodioSerie);
        } else {
            abort(403, 'PE_0007');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodioStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {
                $data = $request->validated();
                $episodio = Episodio::create($data);
                return new EpisodioResource($episodio);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Episodio $episodio)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new EpisodioResource($episodio);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodioUpdateRequest $request, Episodio  $episodio)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {
                $dati = $request->validated();
                $episodio->fill($dati);
                $episodio->save();
                return new EpisodioResource($episodio);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodio $episodio)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $episodio->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }

    public static function ultimi($numero)
    {
        $episodio = null;
        if (Gate::allows('read')) {

            $episodio = Episodio::all()->sortByDesc("created_at")->take($numero);

            return new EpisodioCollection($episodio);
        } else {
            abort(403, 'PE_0001');
        }
    }
}
