<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contatto;
use App\Http\Resources\v1\ContattoCollection;
use App\Http\Resources\v1\ContattoResource;
use App\Http\Requests\v1\ContattoUpdateRequest;
use App\Http\Requests\v1\ContattoStoreRequest;
use App\Http\Resources\v1\CreditoResource;
use App\Models\Credito;
use App\Models\ContattoGruppo;
use App\Models\Password;
use App\Models\Auth;
use App\Models\Indirizzo;
use App\Models\Recapito;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContattoController extends Controller
{
    // Dopo l'autorizzazione dell'utente, mostra tutti i dati o solo due dati
    public function index()
    {
        $contatto = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $contatto = Contatto::all();
            } else {
                $contatto = Contatto::where('idContatto', auth()->user()->idContatto)->get();
            }
            return new ContattoCollection($contatto);
        } else {
            abort(403, 'PE_0001');
        }
    }

    // Memorizza nuovo contatto
    public function store(ContattoStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $data = $request->validated();
            $contatto = Contatto::create($data);
            return new ContattoResource($contatto);
        } else {
            abort(403, '403');
        }
    }

    // Restituisce i contatti
    public function show(Contatto $contatto)
    {
        $risorsa = new ContattoResource($contatto);
        return $risorsa;
        if (Gate::allows('leggere')) {
        } else {
            // echo ($contatto);
            abort(403, '403');
        }
    }

    // Aggiorna il contatto
    public function update(ContattoUpdateRequest $request, Contatto $contatto)
    {
        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $contatto->fill($data);
            $contatto->save();
            return new ContattoResource($contatto);
        } else {
            abort(403, '403');
        }
    }

    //Elimina un contatto
    public function destroy(Contatto $contatto)
    {
        if (Gate::allows('eliminare')) {
            $contatto->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, '403');
        }
    }

    // Registra nuovo contatto
    public function registra(Request $request)
    {

        $dati = [
            "idStato" => $request->idStato,
            "idNazione" => $request->idNazione,
            "nome" => $request->nome,
            "cognome" => $request->cognome,
            "sesso" => $request->sesso,
            "partitaIva" => $request->partitaIva,
            "codiceFiscale" => $request->codiceFiscale,
            "cittaNascita" => $request->cittaNascita,
            "provinciaNascita" => $request->provinciaNascita,
            "dataNascita" => $request->dataNascita,
            "cittadinanza" => $request->cittadinanza
        ];


        $result = DB::transaction(function () use ($request, $dati) {

            //crittografare l'e-mail (chiamato anche utente/utente)
            $userHashed = hash("sha512", $request->email);

            //Verifica se l'e-mail esiste già nel database
            $utenteGiaEsiste = Auth::esisteUtenteValidoPerLogin($userHashed);
            if ($utenteGiaEsiste) {
                abort(403, "ERR 403 - L' utente giá esiste");;
            }

            //crittografando la password
            $pswHashed = hash("sha512", $request->psw);

            //creando l'utente
            $contatto = Contatto::create($dati);

            Auth::create([
                'idContatto' => $contatto->idContatto,
                'user' => $userHashed,
                'sfida' =>  hash("sha512", trim("Ciao")),
                'secretJWT' => hash("sha512", trim("Secret")),
                'inizioSfida' => time()
            ]);

            // generando un sale casuale
            $sale = hash("sha512", trim(Str::random(200)));

            Password::create([
                'idContatto' => $contatto->idContatto,
                'psw' => $pswHashed,
                'sale' => $sale
            ]);

            ContattoGruppo::create([
                'idContatto' => $contatto->idContatto,
                'idGruppo' => 2 // Tipo utente
            ]);

            Indirizzo::create(
                [
                    "idContatto" => $contatto->idContatto,
                    "idTipologiaIndirizzo" => $request->idTipologiaIndirizzo,
                    "idComuneItaliano" => $request->idComuneItaliano,
                    "idNazione" => $request->idNazione,
                    "indirizzo" => hash("sha512", $request->indirizzo),
                    "civico" => $request->civico,
                    "cap" => $request->cap,
                    "localita" => hash("sha512", $request->localita),
                    "preferito" => $request->preferito,
                ]
            );

            Recapito::create([
                "idContatto" => $contatto->idContatto,
                "idTipoRecapito" => $request->idTipoRecapito,
                "recapito" => hash("sha512", $request->recapito),
                "preferito" => $request->preferito,
            ]);

            return $contatto;
        });

        return $result;
    }

    //Aggiorna il credito di un contatto in base al grado di autorizzazione dell'utente
    public function updateCredito($idContatto, $value)
    {
        if (Gate::allows('aggiornare')) {
            $contatto = Contatto::where('idContatto', $idContatto)->first();
            if (Gate::allows('Amministratore') || Auth::user()->idContatto == $contatto->idContatto) {
                $credito = $contatto->crediti;
                if ($credito == null) {
                    $credito = new Credito();
                    $credito->idContatto = $idContatto;
                    $credito->credito = 0;
                    $credito->save();
                }
                if (is_numeric($value)) {
                    $credito->credito = $credito->credito + $value;
                    $credito->save();
                    return new CreditoResource($credito);
                } else {
                    abort(406, "406 Not Acceptable");
                }
            } else {
                abort(404, "404 Not Found");
            }
        } else {
            abort(403, "403 Forbidden");
        }
    }
}
