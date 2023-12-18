<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "film";

    protected $primaryKey = "idFilm";

    protected $fillable = [
        "idFilm",
        "titolo",
        "descrizione",
        "durata",
        "regista",
        "attori",
        "anno",
        "srcImmagine",
        "srcFilmato",
        "srcBanner"
    ];

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class, 'idCategoria', 'idCategoria');
    }
    public function elencoFilmHasContatto1()
    {
        return $this->hasMany(FilmHasContatto::class, 'idFilm', 'idFilm');
    }
}
