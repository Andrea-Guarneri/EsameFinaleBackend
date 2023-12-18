<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Models\Categoria;
use App\Models\CategoriaFilm;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Gate::allows("leggere")) {
            $titolo = (request("titolo") != null) ? request("titolo") : null;
            if ($titolo != null) {
                $film = Film::all()->where('titolo', $titolo);
            } else {
                $film = Film::all();
            }
            return new FilmCollection($film);
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
    public function indexCategory($categoria)
    {
        // if (Gate::allows('leggere')) {
        // $filmCategory = FilmCategoryModel::all()->where('idCategory', $idCategory);
        // return  new FilmCollection($filmCategory);


        $categoryName = Categoria::find($categoria)->nome;
        $filmCategoria = Film::join('categorie_film', 'film.idFilm', '=', 'categorie_film.idFilm')
            ->where('categorie_film.idCategoria', $categoria)
            ->get();

        return new FilmCollection($filmCategoria);;
        // } else {
        //     abort(403, 'PE_0007');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('creare')) {
            if (Gate::allows('Amministratore')) {

                $data = [
                    "titolo" => $request->titolo,
                    "descrizione" => $request->descrizione,
                    "durata" => $request->durata,
                    "regista" => $request->regista,
                    "attori" => $request->attori,
                    "anno" => $request->anno,
                    "srcImmagine" => $request->srcImmagine,
                    "srcFilmato" => $request->srcFilmato,
                    "srcBanner" => $request->srcBanner,
                    "idCategoria" => $request->idCategoria
                ];

                $film = Film::create($data);
                $categoryFilm = CategoriaFilm::create(["idFilm" => $film->idFilm, "idCategoria" => $request->idCategoria]);


                return new FilmResource($film);
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
    public function show(Film $film)
    {
        if (Gate::allows('leggere')) {
            $risorsa = new FilmResource($film);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')) {

                $data = [
                    "titolo" => $request->titolo,
                    "descrizione" => $request->descrizione,
                    "durata" => $request->durata,
                    "regista" => $request->regista,
                    "attori" => $request->attori,
                    "anno" => $request->anno,
                    "srcImmagine" => $request->srcImmagine,
                    "srcFilmato" => $request->srcFilmato,
                    "srcBanner" => $request->srcBanner,
                ];
                $film->fill($data);


                $film->save();
                return new FilmResource($film);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        if (Gate::allows('eliminare')) {
            if (Gate::allows('Amministratore')) {
                $film->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0004');
            }
        } else {
            abort(403, 'PE_0005');
        }
    }

    public static function ultimi($numero)
    {
        $film = null;
        if (Gate::allows('leggere')) {

            $film = Film::all()->sortByDesc("created_at")->take($numero);

            return new FilmCollection($film);
        } else {
            abort(403, 'PE_0001');
        }
    }
}
