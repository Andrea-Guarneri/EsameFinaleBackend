<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SerieTvStoreRequest;
use Illuminate\Http\Request;
use App\Models\SerieTv;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvResource;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Models\CategoriaSerie;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
{
    // Restituisce tutti i valori
    public function index()
    {

        if (Gate::allows("leggere")) {
            $titolo = (request("titolo") != null) ? request("titolo") : null;
            if ($titolo != null) {
                $serie = SerieTv::all()->where('titolo', $titolo);
            } else {
                $serie = SerieTv::all();
            }
            return new SerieTvCollection($serie);
        } else {
            abort(403, '403');
        }
    }

    // Restituisce una serie e la sua categoria
    public function indexCategory($categoria)
    {
        // if (Gate::allows('leggere')) {

        $serieCategoria = SerieTv::join('categorie_serie', 'serie_tv.idSerie', '=', 'categorie_serie.idSerie')
            ->where('categorie_serie.idCategoria', $categoria)
            ->get();


        return new SerieTvCollection($serieCategoria);
        // } else {
        //     abort(403, '403');
        // }
    }

    // Memorizza un valore
    public function store(Request $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {

                $data = [
                    "titolo" => $request->titolo,
                    "descrizione" => $request->descrizione,
                    "totaleStagioni" => $request->totaleStagioni,
                    "numeroEpisodio" => $request->numeroEpisodio,
                    "regista" => $request->regista,
                    "attori" => $request->attori,
                    "annoInizio" => $request->annoInizio,
                    "annoFine" => $request->annoFine,
                    "srcImmagine" => $request->srcImmagine,
                    "srcFilmato" => $request->srcFilmato,
                    "srcBanner" => $request->srcBanner,
                    "idCategoria" => $request->idCategoria
                ];
                $serie = SerieTv::create($data);
                $categoryFilm = CategoriaSerie::create(["idSerie" => $serie->idSerie, "idCategoria" => $request->idCategoria]);
                return new SerieTvResource($serie);
            } else {
                abort(404, '403');
            }
        } else {
            abort(403, '403');
        }
    }

    // restituisce un valore
    public function show(SerieTv $serie)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new SerieTvResource($serie);
            return $risorsa;
        } else {
            abort(403, '403');
        }
    }

    // Restituisce tutti i valori
    public function update(Request $request, SerieTv  $serieTv)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {

                $data = [
                    "titolo" => $request->titolo,
                    "descrizione" => $request->descrizione,
                    "totaleStagioni" => $request->totaleStagioni,
                    "numeroEpisodio" => $request->numeroEpisodio,
                    "regista" => $request->regista,
                    "attori" => $request->attori,
                    "annoInizio" => $request->annoInizio,
                    "annoFine" => $request->annoFine,
                    "srcImmagine" => $request->srcImmagine,
                    "srcFilmato" => $request->srcFilmato,
                    "srcBanner" => $request->srcBanner,
                ];

                $serieTv->fill($data);

                $serieTv->save();

                return new SerieTvResource($serieTv);
            } else {
                abort(403, '403');
            }
        }
    }

    // restituisce un valore
    public function destroy(SerieTv $serieTv)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $serieTv->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0004');
            }
        } else {
            abort(403, '403');
        }
    }

    //restituisce l'ultimo serie registrato
    public static function ultimi($numero)
    {

        $film = null;
        if (Gate::allows('leggere')) {

            $film = SerieTv::all()->sortByDesc("created_at")->take($numero);

            return new SerieTvCollection($film);
        } else {
            abort(403, '403');
        }
    }
}
