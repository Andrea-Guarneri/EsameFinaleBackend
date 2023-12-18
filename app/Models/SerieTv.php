<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieTv extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "serie_tv";

    protected $primaryKey = "idSerie";

    protected $fillable = [
        "titolo",
        "descrizione",
        "totaleStagioni",
        "numeroEpisodio",
        "regista",
        "attori",
        "annoInizio",
        "annoFine",
        "srcImmagine",
        "srcFilmato",
        "srcBanner"
    ];

    public function elencoSerieTv()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function elencoEpisodi()
    {
        return $this->hasMany(Episodio::class, 'idSerie', 'idSerie');
    }
}
