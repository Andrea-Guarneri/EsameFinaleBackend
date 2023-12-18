<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accesso extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "accessi";
    protected $primaryKey = 'idAccesso';
    protected $fillable = ["idAccesso", "idContatto", "autenticato", "ip"];

    //public
    /**
     * Aggiungi accesso per l'idContatto
     *
     * @param string $idContatto
     *
     */
    public static function aggiungiAccesso($idContatto)
    {
        Accesso::cancellaTentativi($idContatto);
        return Accesso::nuovoRecord($idContatto, 1);
    }

    /**
     * Aggiungi tentativo fallito per l'idContatto
     *
     * @param string $idContatto
     *
     */
    public static function aggiungiTentativoFallito($idContatto)
    {
        return Accesso::nuovoRecord($idContatto, 0);
    }

    /**
     * Conta quanti tentativi per l'idContatto sono registrati
     * @param string $idContatto
     * @return integer
     */
    public static function contaTentativi($idContatto)
    {
        $tmp = Accesso::where("idContatto", $idContatto)->where("autenticato", 0)->count();
        return $tmp;
    }

    //Protected
    /**
     * Conta quanti tentativi per l'idContatto sono registrati
     *
     * @param string idContatto
     * @param boolean $autenticato
     * @return App\Models\Accesso
     */
    protected static function nuovoRecord($idContatto, $autenticato)
    {
        $tmp = Accesso::create([
            "idContatto" => $idContatto,
            "autenticato" => $autenticato,
            "ip" => request()->ip()
        ]);
        return $tmp;
    }


    public static function  cancellaTentativi($idContatto)
    {
        Accesso::where("idContatto", $idContatto)->delete();
    }

    protected static function nuovoAccesso($idContatto)
    {
        Accesso::cancellaTentativi($idContatto);
        return Accesso::nuovoRecord($idContatto, 1);
    }
}
