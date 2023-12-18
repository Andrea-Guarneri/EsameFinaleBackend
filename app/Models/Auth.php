<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Auth extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "auth";
    protected $primaryKey = "idAuth";

    protected $fillable = [
        "idAuth",
        "idContatto",
        "user",
        "sfida",
        "secretJWT",
        "inizioSfida",
        "mustChange"
    ];

    /**
     * Controlla se esiste l'utente passato
     * 
     * @param string $user
     * @return boolean
     */
    public static function esisteUtenteValidoPerLogin($user)
    {

        $tmp = DB::table('contatti')->join('auth', 'contatti.idContatto', '=', 'auth.idContatto')->where('contatti.idStato', '=', 1)->where('auth.user', '=', $user)->select('auth.idContatto')->get()->count();

        return ($tmp > 0) ? true : false;
    }
    /**
     * Controlla se esiste l'utente passato
     * 
     * @param string $user
     * @return boolean
     */
    public static function esisteUtente($user)
    {
        $tmp = DB::table('auth')->where('auth.user', '=', $user)->select('auth.idContatto')->get()->count();
        return ($tmp > 0) ? true : false;
    }



    public function elencoContatti()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
    public function contatto()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
}
