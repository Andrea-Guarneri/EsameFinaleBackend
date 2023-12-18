<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recapito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "recapiti";
    protected $primaryKey = "idRecapito";

    protected $fillable = [
        "idContatto",
        "idTipoRecapito",
        "recapito",
        "preferito"
    ];

    public function elencoRecapiti()
    {
        return $this->belongsTo(Contatto::class, 'idContatto', 'idContatto');
    }
    public function elencoRecapiti2()
    {
        return $this->belongsTo(TipologiaRecapito::class, 'idTipoContatto', 'idTipoContatto');
    }
}
