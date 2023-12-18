<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TraduzioneCustom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "traduzioni_custom";
    protected $primaryKey = "idTraduzione";

    protected $fillable = [
        "idLingua",
        "chiave",
        "valore"
    ];

    public function elencoTraduzioniCustom()
    {
        return $this->belongsTo(Lingua::class, 'idLingua', 'idLingua');
    }
}
