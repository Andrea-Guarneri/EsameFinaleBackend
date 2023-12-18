<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLibro extends Model
{
    use HasFactory;

    protected $table = "categorie_libri";

    protected $primaryKey = "idCategoriaLibro";

    protected $fillable = [
        "nome"
    ];
}
