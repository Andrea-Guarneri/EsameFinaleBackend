<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaFilm extends Model
{
    use HasFactory;

    protected $fillable = [
        "idFilm",
        "idCategoria"
    ];

    protected $table = 'categorie_film';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsToMany(Film::class, 'idCategoria', 'idFilm');
    }

    public function category()
    {
        return $this->belongsToMany(Categoria::class, 'idCategoria');
    }
}
