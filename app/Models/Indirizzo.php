<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indirizzo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "indirizzi";
    protected $primaryKey = "idIndirizzo";

    protected $fillable = [
        "idContatto",
        "idTipologiaIndirizzo",
        "idNazione",
        "idComuneItaliano",
        "indirizzo",
        "civico",
        "cap",
        "preferito",
        "localita",
    ];

    public function elencoIndirizzi()
    {
        return $this->belongsTo(TipologiaIndirizzo::class, 'idTipologiaIndirizzo', 'idTipologiaIndirizzo');
    }
    public function elencoIndirizziNazione()
    {
        return $this->belongsTo(Nazione::class, 'idNazione', 'idNazione');
    }
    public function elencoIndirizziComuni()
    {
        return $this->belongsTo(ComuneItaliano::class, 'idComuneItaliano', 'idComuneItaliano');
    }
    public function elencoIndirizziContatti()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
}
