<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Models\Accesso;
use App\Models\Auth;
use App\Models\Configurazione;
use App\Models\Password;
use App\Models\Sessione;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccediController extends Controller
{

    //Cerca Se c'è già un utente con questa email
    public function searchMail($utente)
    {
        $tmp = (Auth::esisteUtente($utente)) ? true : false;
        return AppHelpers::rispostaCustom($tmp);
    }

    // Controlla se il token è valido
    public static function verificaToken($token)
    {
        $rit = null;
        $sessione = Sessione::datiSessione($token);

        if ($sessione != null) {

            $inizioSessione = $sessione->inizioSessione;

            $durataSessione = Configurazione::leggiValore("durataSessione");

            $scadenzaSessione = $inizioSessione + $durataSessione;


            if (time() > $scadenzaSessione || true) {

                $auth = Auth::where('idContatto', $sessione->idContatto)->first();
                if ($auth != null) {
                    $secretJWT = $auth->secretJWT;
                    // return $auth;
                    $payload = AppHelpers::validaToken($token, $secretJWT, $sessione);
                    if ($payload != null) {
                        $rit = $payload;

                    } else {
                        abort(403, 'Permesso negato');
                    }
                } else {
                    abort(403, 'Permesso negato');
                }
            } else {
                abort(403, 'Permesso negato');
            }
        } else {
            abort(403, 'Permesso negato');
        }
        return $rit;
    }



    // funzione di supporto per testare il token
    public static function testToken()
    {
        $utente = hash("sha512", trim("Admin@Utente"));
        $password = hash("sha512", trim("Password123!"));
        $sale = hash("sha512", trim("Sale"));
        $sfida = hash("sha512", trim("Sfida"));
        $secretJWT = hash("sha512", trim("Secret"));
        $auth = Auth::where('user', $utente)->firstOrFail();

        if ($auth != null) {
            $auth->inizioSfida = time();
            $auth->secretJWT = $secretJWT;
            $auth->save();

            $recordPassword = Password::passwordAttuale($auth->idContatto);
            if ($recordPassword != null) {
                $recordPassword->sale = $sale;
                $recordPassword->psw = $password;
                $recordPassword->save();
                $cipher = AppHelpers::nascondiPassword($password, $sale);
                $tk = AppHelpers::creaTokenSessione($auth->idContatto, $secretJWT);
                $dati = array("token" => $tk, "xLogin" => $cipher);
                $sessione = Sessione::where("idContatto", $auth->idContatto)->firstOrFail();
                $sessione->token = $tk;
                $sessione->inizioSessione = time();
                $sessione->save();

                return AppHelpers::rispostaCustom($dati);
            }
        }
    }



    //titolare del trattamento per gestire le richieste
    protected function controlloUtente($utente)
    {
        $sale = hash("sha512", trim(Str::random(200)));

        if (Auth::esisteUtenteValidoPerLogin($utente)) {

            $auth = Auth::where('user', $utente)->first();
            $auth->secretJWT = hash('sha512', trim(Str::random(200)));
            $auth->inizioSfida = time();
            $auth->save();
            $recordPassword = Password::passwordAttuale($auth->idContatto);
            $recordPassword->sale = $sale;
            $recordPassword->save();
        } else {
            dd('404 - not found');
        }

        $dati = array("sale" => $sale);
        return AppHelpers::rispostaCustom($dati);
    }

    //controllore di password
    protected static function controlloPassword($utente, $hashClient)
    {
        // echo ($utente);
        if (Auth::esisteUtenteValidoPerLogin($utente)) {

            $auth = Auth::where('user', $utente)->first();

            $secretJWT = $auth->secretJWT;



            // echo ($secretJWT);
            $inizioSfida = $auth->inizioSfida;

            $durataSfida = Configurazione::leggiValore("durataSfida");
            $maxTentativi = Configurazione::leggiValore("maxLoginErrati");
            $scadenzaSfida = $inizioSfida + $durataSfida;

            if (time() < $scadenzaSfida || true) {

                $tentativi = Accesso::contaTentativi($auth->idContatto);
                if ($tentativi >= 0) {

                    $recordPassword = Password::passwordAttuale($auth->idContatto);


                    $password = $recordPassword->psw;
                    $sale = $recordPassword->sale;

                    // print_r("\npassword:" . $password);
                    // print_r("\nsale:" . $sale);
                    // print_r("\nHash Client: " . $hashClient);
                    $passwordNascostaDB = AppHelpers::nascondiPassword($password, $sale);
                    // print_r("\nHashServer: " . $passwordNascostaDB);

                    // echo ($passwordNascostaDB);
                    if ($hashClient == $passwordNascostaDB) {

                        $tk = AppHelpers::creaTokenSessione($auth->idContatto, $secretJWT);
                        Accesso::cancellaTentativi($auth->idContatto);
                        $accesso = Accesso::aggiungiAccesso($auth->idContatto);
                        Sessione::eliminaSessione($auth->idContatto);
                        Sessione::aggiornaSessione($auth->idContatto, $tk);

                        $dati = array("tk" => $tk);

                        return AppHelpers::rispostaCustom($dati);
                    } else {
                        Accesso::aggiungiTentativoFallito($auth->idContatto);

                        abort(403, "ERR 403");
                    }
                } else {

                    abort(403, "ERR 403");
                }
            } else {

                Accesso::aggiungiTentativoFallito($auth->idContatto);
                abort(403, "ERR 403");
            }
        } else {
            abort(403, "ERR 403");
        }
    }

    //funzione per elencare tutti gli utenti
    public function show($utente, $hash = null)
    {
        if ($hash == null) {
            return $this->controlloUtente($utente);
        } else {

            return AccediController::controlloPassword($utente, $hash);
        }
    }

    public function login(Request $request)
    {
        $utente = $request->utente;

        // $utente = $request->utente;
        $hashPswSaleUtente = $request->hashPswSaleUtente;

        if ($hashPswSaleUtente == null) { # Se solo l'utente sta passando
            return $this->controlloUtente($utente);
        } else { # Se sta passando il nome utente e l'hash di (password + sale)
            return AccediController::controlloPassword($utente, $hashPswSaleUtente);
        }
    }
    //funzione di test per il login ausiliario
    public static function testLogin($hashUtente, $hashPassword)
    {
        return AccediController::controlloPassword($hashUtente, $hashPassword);
    }
}
