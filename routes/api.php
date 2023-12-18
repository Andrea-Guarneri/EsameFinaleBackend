<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\api\v1\AccediController;
use App\Http\Controllers\api\v1\CalcolaIva;
use App\Http\Controllers\api\v1\CategoriaController;
use App\Http\Controllers\api\v1\CategoriaFilmController;
use App\Http\Controllers\api\v1\CategoriaLibroController;
use App\Http\Controllers\api\v1\CategoriaSerieController;
use App\Http\Controllers\api\v1\ComuneItalianoController;
use App\Http\Controllers\api\v1\ConfigurazioneController;
use App\Http\Controllers\api\v1\ContattoController;
use App\Http\Controllers\api\v1\CreditoController;
use App\Http\Controllers\api\v1\EpisodioController;
use App\Http\Controllers\api\v1\FilmController;
use App\Http\Controllers\api\v1\GruppoController;
use App\Http\Controllers\api\v1\IndirizzoController;
use App\Http\Controllers\api\v1\NazioneController;
use App\Http\Controllers\api\v1\ProvinciaController;
use App\Http\Controllers\api\v1\RecapitoController;
use App\Http\Controllers\api\v1\SerieTvController;
use App\Http\Controllers\api\v1\StatoController;
use App\Http\Controllers\api\v1\TipologiaIndirizzoController;
use App\Http\Controllers\api\v1\TipologiaRecapitoController;
use App\Http\Controllers\api\v1\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

if (!defined('_VERS')) {
    define('_VERS', 'v1');
}





//----------------------------------------------------------------------------------------------------------------------------
Route::get(_VERS . '/verificaToken', function (Request $request) {

    $token = trim(str_replace('Bearer', '', $request->header("authorization")));

    $result = \App\Http\Controllers\api\v1\AccediController::verificaToken($token);

    return $result->data;
});

Route::get(_VERS . '/test_autenticazione', function (Request $request) {

    $middleware = new \App\Http\Middleware\Autenticazione();
    $response = $middleware->handle($request, function ($request) {
        return response('funziona!');
    });

    return $response;
});


Route::get(_VERS . '/testLogin', function () {

    $hashUtente = "aa73b2c8f6d2c2a31e686548e56c2ae70eb659e8b6f0d6b72a6bffe59d86f7d5670668c3eecf7384898452f03451b6435f6fcc7bcb59514ae28f248f535a8c79";
    $pwd = "09b261daf5046d0eaac1648b77cb1fb571e8f4702a8b19a436f73f5aead8d754b3ab2fa12dc9bf31e91f0035188a82d5ba2be2fd15ceec67c34125a7d9d92015";
    $sale = "aea252602d177f1afbe2755928b32854fd637fbc7e05751770fd743673b3355ae1f1c08239815c78e68c4b334be8b8f8ce3c2d638e20fa952275d5388d4c8d70";


    $hashSalePsw = AppHelpers::nascondiPassword($pwd, $sale);
    print_r($hashSalePsw);

    return AccediController::testLogin($hashUtente, $hashSalePsw);
});

// Ospite

// Login user
Route::post(_VERS . '/login', [AccediController::class, 'login']);

//Registrazione
Route::get(_VERS . '/accedi/{utente}/{hash?}', [AccediController::class, 'show']);
Route::get(_VERS . '/searchMail/{utente}', [AccediController::class, 'searchMail']);

Route::post(_VERS . '/registrazione', [ContattoController::class, 'registra']);

//Upload
Route::post(_VERS . '/upload', [UploadController::class, 'index']);

//Gruppi
Route::get(_VERS . '/gruppi', [GruppoController::class, 'index']);
Route::get(_VERS . '/gruppi/{gruppo}', [GruppoController::class, 'show']);

//Tipologia Indirizzi
Route::get(_VERS . '/tipologiaIndirizzi', [TipologiaIndirizzoController::class, 'index']);
Route::get(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [TipologiaIndirizzoController::class, 'show']);
Route::put(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [TipologiaIndirizzoController::class, 'update']);
Route::post(_VERS . '/tipologiaIndirizzi', [TipologiaIndirizzoController::class, 'store']);
Route::delete(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [TipologiaIndirizzoController::class, 'destroy']);

//Stati
Route::get(_VERS . '/stati', [StatoController::class, 'index']);
Route::get(_VERS . '/stati/{stato}', [StatoController::class, 'show']);


//Categorie Libri (esercizio)
Route::get(_VERS . '/categorieLibri', [CategoriaLibroController::class, 'index']);
Route::get(_VERS . '/categorieLibri/{categoriaLibro}', [CategoriaLibroController::class, 'show']);
Route::post(_VERS . '/categorieLibri', [CategoriaLibroController::class, 'store']);
Route::put(_VERS . '/categorieLibri/{categoriaLibro}', [CategoriaLibroController::class, 'update']);
Route::delete(_VERS . '/categorieLibri/{categoriaLibro}', [CategoriaLibroController::class, 'destroy']);

//Inserisci un numero e calcola l'iva
Route::get(_VERS . '/calcolaIva/{number}', [CalcolaIva::class, 'calcola']);



//Pronvicia     Ospite puo accessare (senza login)
Route::get(_VERS . "/provincia", [ProvinciaController::class, "index"]);
Route::get(_VERS . "/provincia/{provincia}", [ProvinciaController::class, "show"]);

//Comuni Italiani
Route::get(_VERS . '/comuniItaliani', [ComuneItalianoController::class, 'index']);
Route::get(_VERS . '/comuniItaliani/{comuneItaliano}', [ComuneItalianoController::class, 'show']);


Route::get(_VERS . "/nazioni", [NazioneController::class, 'index']);
Route::get(_VERS . "/nazioni/continente/{continente}", [NazioneController::class, 'indexContinente']);

//Api con autenticazione Utente & Amministratore
Route::middleware(['autenticazione', 'contattiRuoli:Amministratore,Utente'])->group(function () {
    //Contatti
    Route::get(_VERS . '/contatti/{contatto}', [ContattoController::class, 'show']);
    Route::post(_VERS . '/contatti', [ContattoController::class, 'store']);
    Route::put(_VERS . '/contatti/{contatto}', [ContattoController::class, 'update']);
    Route::delete(_VERS . '/contatti/{contatto}', [ContattoController::class, 'destroy']);

    // Indirizzi
    Route::get(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'show']);
    Route::put(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'update']);
    Route::post(_VERS . '/indirizzi', [IndirizzoController::class, 'store']);
    Route::delete(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'destroy']);

    //Categorie
    Route::get(_VERS . '/categorie', [CategoriaController::class, 'index']);
    Route::get(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'show']);

    //CategorieFilm
    Route::get(_VERS . '/categorieFilm', [CategoriaFilmController::class, 'index']);
    Route::get(_VERS . '/categorieFilm/{categoriaFilm}', [CategoriaFilmController::class, 'show']);

    //CategorieSerie
    Route::get(_VERS . '/categorieSerie', [CategoriaSerieController::class, 'index']);
    Route::get(_VERS . '/categorieSerie/{categoriaSerie}', [CategoriaSerieController::class, 'show']);

    // FILM
    Route::get(_VERS . '/film', [FilmController::class, 'index']);
    Route::get(_VERS . '/film/ultimi/{numero}', [FilmController::class, 'ultimi']);
    Route::get(_VERS . '/categorie/film/{categoria}', [FilmController::class, 'indexCategory']);
    Route::get(_VERS . '/film/{film}', [FilmController::class, 'show']);

    // SerieTv

    Route::get(_VERS . '/serieTv', [SerieTvController::class, 'index']);
    Route::get(_VERS . '/serieTv/ultimi/{numero}', [SerieTvController::class, 'ultimi']);
    Route::get(_VERS . '/categorie/serieTv/{categoria}', [SerieTvController::class, 'indexCategory']);
    Route::get(_VERS . '/serieTv/{serie}', [SerieTvController::class, 'show']);


    // Crediti
    Route::get(_VERS . '/crediti/{credito}', [CreditoController::class, 'show']);
    Route::post(_VERS . '/crediti/{credito}/{value}', [ContattoController::class, 'updateCredito']);

    //Recapiti
    Route::get(_VERS . '/recapiti/{recapito}', [RecapitoController::class, 'show']);
    Route::put(_VERS . '/recapiti/{recapito}', [RecapitoController::class, 'update']);
    Route::post(_VERS . '/recapiti', [RecapitoController::class, 'store']);
    Route::delete(_VERS . '/recapiti/{recapito}', [RecapitoController::class, 'destroy']);

    //Episodi
    Route::get(_VERS . '/serieTv/{serieTv}/episodi', [EpisodioController::class, 'indexSerie']);
    Route::get(_VERS . '/categorie/serieTv/{serieTv}/episodi', [EpisodioController::class, 'indexSerie']);
    Route::get(_VERS . '/serieTv/{serieTv}/episodi/ultimi/{numero}', [EpisodioController::class, 'ultimi']);
    Route::get(_VERS . '/serieTv/{serieTv}/episodi/{episodio}', [EpisodioController::class, 'show']);
    Route::get(_VERS . '/categorie/serieTv/{serieTv}/episodi/{episodio}', [EpisodioController::class, 'show']);
});

//Api con autenticazione Amministratore
Route::middleware(['autenticazione', 'contattiRuoli:Amministratore'])->group(function () {

    // ComuniItaliani
    Route::put(_VERS . '/comuniItaliani/{comuneItaliano}', [ComuneItalianoController::class, 'update']);
    Route::post(_VERS . '/comuniItaliani', [ComuneItalianoController::class, 'store']);

    // Nazioni
    Route::get(_VERS . "/nazioni/{nazione}", [NazioneController::class, 'show']);
    Route::put(_VERS . "/nazioni/{nazione}", [NazioneController::class, 'update']);
    Route::post(_VERS . "/nazioni", [NazioneController::class, 'store']);
    

    //Categorie
    Route::post(_VERS . '/categorie', [CategoriaController::class, 'store']);
    Route::put(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'update']);
    Route::delete(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'destroy']);

    //CategorieFilm
    Route::post(_VERS . '/categorieFilm', [CategoriaFilmController::class, 'store']);
    Route::put(_VERS . '/categorieFilm/{categoriaFilm}', [CategoriaFilmController::class, 'update']);
    Route::delete(_VERS . '/categorieFilm/{categoriaFilm}', [CategoriaFilmController::class, 'destroy']);

    //CategorieSerie
    Route::post(_VERS . '/categorieSerie', [CategoriaSerieController::class, 'store']);
    Route::put(_VERS . '/categorieSerie/{categoriaSerie}', [CategoriaSerieController::class, 'update']);
    Route::delete(_VERS . '/categorieSerie/{categoriaSerie}', [CategoriaSerieController::class, 'destroy']);


    //Tipologia Recapiti
    Route::put(_VERS . '/tipologiaRecapiti/{tipologiaRecapito}', [TipologiaRecapitoController::class, 'update']);
    Route::post(_VERS . '/tipologiaRecapiti', [TipologiaRecapitoController::class, 'store']);
    Route::delete(_VERS . '/tipologiaRecapiti/{tipologiaRecapito}', [TipologiaRecapitoController::class, 'destroy']);

    //Contatti
    Route::get(_VERS . '/contatti', [ContattoController::class, 'index']);

    //Stati
    Route::put(_VERS . '/stati/{stato}', [StatoController::class, 'update']);
    Route::post(_VERS . '/stati', [StatoController::class, 'store']);
    Route::delete(_VERS . '/stati/{stato}', [StatoController::class, 'destroy']);

    //Gruppi
    Route::put(_VERS . '/gruppi/{gruppo}', [GruppoController::class, 'update']);
    Route::post(_VERS . '/gruppi', [GruppoController::class, 'store']);
    Route::delete(_VERS . '/gruppi/{gruppo}', [GruppoController::class, 'destroy']);

    // Crediti
    Route::get(_VERS . '/crediti', [CreditoController::class, 'index']);
    Route::post(_VERS . '/crediti', [CreditoController::class, 'store']);
    Route::put(_VERS . '/crediti/{credito}', [CreditoController::class, 'update']);
    Route::delete(_VERS . '/crediti/{credito}', [CreditoController::class, 'destroy']);

    //Recapiti
    Route::get(_VERS . '/recapiti', [RecapitoController::class, 'index']);

    //Indirizzi
    Route::get(_VERS . '/indirizzi', [IndirizzoController::class, 'index']);


    //Film
    Route::post(_VERS . '/film', [FilmController::class, 'store']);
    Route::put(_VERS . '/film/{film}', [FilmController::class, 'update']);
    Route::delete(_VERS . '/film/{film}', [FilmController::class, 'destroy']);

    //Serie TV
    Route::post(_VERS . '/serieTv', [SerieTvController::class, 'store']);
    Route::put(_VERS . '/serieTv/{serieTv}', [SerieTvController::class, 'update']);
    Route::delete(_VERS . '/serieTv/{serieTv}', [SerieTvController::class, 'destroy']);

    // Crediti
    Route::get(_VERS . '/crediti/{credito}', [CreditoController::class, 'show']);

    //Configurazioni
    Route::get(_VERS . '/configurazioni', [ConfigurazioneController::class, 'index']);
    Route::get(_VERS . '/configurazioni/{configurazione}', [ConfigurazioneController::class, 'show']);

    //Episodi
    Route::get(_VERS . '/episodi', [EpisodioController::class, 'index']);
    Route::post(_VERS . '/serieTv/{serieTv}/episodi', [EpisodioController::class, 'store']);
    Route::put(_VERS . '/serieTv/{serieTv}/episodi/{episodio}', [EpisodioController::class, 'update']);
    Route::delete(_VERS . '/serieTv/{serieTv}/episodi/{episodio}', [EpisodioController::class, 'destroy']);
});
