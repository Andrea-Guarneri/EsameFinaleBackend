<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmHasContatto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "film_has_contatti";
    protected $primaryKey = "idFilmHasContatto";

    protected $fillable = [
        "idFilm",
        "idContatto",
    ];

    public function elencoFilmHasContatto1()
    {
        return $this->belongsTo(Film::class, 'idFilm', 'idFilm');
    }
    public function elencoFilmHasContatto2()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
}
