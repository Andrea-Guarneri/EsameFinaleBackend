<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComuneItaliano extends Model
{
    use HasFactory;

    protected $table = "comuni_italiani";

    protected $primaryKey = "idComuneItaliano";

    protected $fillable = 
    [
        "nome",
        "regione",
        "provincia",
        "metropolitana",
        "siglaAutomobilistica",
        "codiceCatastale",
        "multicap",
        "capoluogo",
        "cap",
        "capFine",
        "capInizio"
    ];

    public function elencoIndirizziComune()
    {
        return $this->hasMany(Indirizzo::class, 'idComuneItaliano', 'idComuneItaliano');
    }
}
