<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipologiaRecapito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipologia_recapiti";
    protected $primaryKey = "idTipoRecapito";

    protected $fillable = [
        "nome"
    ];

    public function elencoRecapiti()
    {
        return $this->belongsToMany(Recapito::class, 'idTipoRecapito', 'idTipoRecapito');
    }
}
