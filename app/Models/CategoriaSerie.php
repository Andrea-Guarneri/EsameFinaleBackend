<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaSerie extends Model
{
    use HasFactory;

    protected $fillable = ["idCategoria", "idSerie"];

    protected $table = 'categorie_serie';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function serie()
    {
        return $this->belongsToMany(SerieTv::class, 'idCategoria', 'idSerie');
    }

    public function category()
    {
        return $this->belongsToMany(Categoria::class, 'idCategoria');
    }
}
