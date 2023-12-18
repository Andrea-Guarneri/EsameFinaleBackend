<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "password";
    protected $primaryKey = "idPassword";

    protected $fillable = [
        "idPassword",
        "idContatto",
        "psw",
        "sale",
    ];

    /**
     * Ritorna il record della password attualmente usata
     * 
     * @param integer $idContatto
     * @return \App\Models\Password
     */

    public static function passwordAttuale($idContatto)
    {
        $record = Password::where("idContatto", $idContatto)->orderBy("idPassword", "desc")->firstOrFail();
        return $record;
    }

    public function elencoContatti()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
}
