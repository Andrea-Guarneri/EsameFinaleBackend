<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episodio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "episodi";

    protected $primaryKey = "idEpisodio";

    protected $fillable = [
        "idSerie",
        "titolo",
        "descrizione",
        "numeroStagione",
        "numeroEpisodio",
        "durata",
        "anno",
        "srcImmagine",
        "srcFilmato",
    ];

    public function elencoEpisodi()
    {
        return $this->belongsTo(Episodio::class, 'idSerie', 'idSerie');
    }
}
