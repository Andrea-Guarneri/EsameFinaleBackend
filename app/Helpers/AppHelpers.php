<?php

namespace App\Helpers;

use Illuminate\Support\Arr;
use App\Models\Contatto;
use Illuminate\Support\Facades\Crypt;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AppHelpers
{

    public static function aggiornaRegoleHelper($rules)
    {
        $newRules = array_map(function ($value) {
            return str_replace("required|", "", $value);
        }, $rules);

        return $newRules;
    }


    public static function isAdmin($idGruppo)
    {
        return ($idGruppo == 1) ? true : false;
    }



    public static function cifra($testo, $chiave)
    {
        $testoCifrato = AesCtr::encrypt($testo, $chiave, 256);
        return base64_encode($testoCifrato);
    }


    public static function creaPasswordCifrata($password, $sale, $sfida)
    {
        $hashPasswordESale = AppHelpers::nascondiPassword($password, $sale);
        $hashFinale = AppHelpers::cifra($hashPasswordESale, $sfida);
        return $hashFinale;
    }


    public static function creaTokenSessione($idContatto, $secretJWT, $usaDa = null, $scade = null)
    {
        $maxTime = 15 * 24 * 60 * 60; //Il token scade sempre dopo 15 gg max
        $recordContatto = Contatto::where("idContatto", $idContatto)->first();
        $t = time();
        $nbf = ($usaDa == null) ? $t : $usaDa;
        $exp = ($scade == null) ? $nbf + $maxTime : $scade;

        // $ruolo = $recordContatto->ruoli[0];
        //$idRuolo = $ruolo->idContattoRuolo;
        $ruoli = $recordContatto->gruppi()->get();
        $ruolo = $ruoli[0];

        $idRuolo = $ruolo->idGruppo;

        $abilita = $ruolo->contattiAbilita()->get()->toArray();
        $abilita = array_map(function ($arr) {
            return $arr["idAbilita"];
        }, $abilita);


        $arr = array(
            "iss" => "guarneri.work@gmail.com",
            "aud" => null,
            "iat" => $t,
            "nbf" => $nbf,
            "exp" => $exp,
            "data" => array(
                "idContatto" => $idContatto,
                "idStato" => $recordContatto->idContattoStato,
                "idGruppo" => $idRuolo,
                "abilita" => $abilita,
                "nome" => trim($recordContatto->nome . " " . $recordContatto->cognome)
            )
        );


        $token = JWT::encode($arr, $secretJWT, 'HS256');
        return $token;
    }


    public static function decifra($testoCifrato, $chiave)
    {
        $testoCifrato = base64_decode($testoCifrato);
        return AesCtr::decrypt($testoCifrato, $chiave, 256);
    }


    /**
     * Nascondi password
     *
     * @param string $password
     * @param string $sale
     * @return string
     */
    public static function rispostaCustom($dati, $msg = null, $err = null)
    {
        $response = array();
        $response["data"] = $dati;

        if ($msg != null) $response["message"] = $msg;
        if ($err != null) $response["error"] = $err;

        return $response;
    }
    /**
     * Nascondi la password
     *
     * @param string $password
     * @param string $sale
     * @return string
     */
    public static function nascondiPassword($psw, $sale)
    {
        return hash("sha512", $psw . $sale);
    }

    /**
     * Valida Token
     *
     * @param string $token
     * @param string $messaggio
     * @param array $errori
     * @return object
     */
    public static function validaToken($token, $secretJWT, $sessione)
    {
        $rit = null;

        $payload = JWT::decode($token, new Key($secretJWT, 'HS256'));
        if ($payload->iat <= $sessione->inizioSessione) {
            if ($payload->data->idContatto == $sessione->idContatto) {
                $rit = $payload;
            }
        }
        return $rit;
    }
}
