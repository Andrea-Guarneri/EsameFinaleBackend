<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categorie";

    protected $primaryKey = "idCategoria";

    protected $fillable = [
        "idCategoria",
        "nome",
        "srcImmagine",
        "descrizione",
        "watch"
    ];

    public function elencoSerieTv()
    {
        return $this->hasMany(SerieTv::class, 'idCategoria', 'idCategoria');
    }

    public function elencoFilm()
    {
        return $this->hasMany(Film::class, 'idCategoria', 'idCategoria');
    }
}
