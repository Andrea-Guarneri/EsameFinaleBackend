<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sessione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sessioni";
    protected $primaryKey = "idSessione";

    protected $fillable = [
        "idContatto",
        "token",
        "inizioSessione",
    ];

    /**
     * Aggiorna la sessione per il contatto ed il token passato
     * 
     * @param integer $idContatto
     * @param string $token
     */
    public static function aggiornaSessione($idContatto, $tk)
    {
        $where = ["idContatto" => $idContatto, "token" => $tk];
        $arr = ["inizioSessione" => time()];
        DB::table("sessioni")->updateOrInsert($where, $arr);
    }

    /**
     * Elimina la sessione per il contatto passato
     * 
     * @param integer $idContatto
     */
    public static function eliminaSessione($idContatto)
    {
        DB::table("sessioni")->where("idContatto", $idContatto)->delete();
    }

    /**
     * Dati sessione
     * 
     * @param string $token
     * @return App\Models\Sessione
     * 
     */
    public static function datiSessione($token)
    {
        if (Sessione::esisteSessione($token)) {
            return Sessione::where('token', $token)->get()->first();
        } else {
            return null;
        }
    }

    /**
     * Controlla se esiste la sessione col token passato
     * 
     * @param string $token
     * @return boolean
     */
    public static function esisteSessione($token)
    {
        return DB::table("sessioni")->where('token', $token)->exists();
    }


    public function contatto()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
}
