<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoGruppo extends Model
{
    use HasFactory;

    protected $table = "contatti_gruppi";

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "idContatto",
        "idGruppo"
    ];

    public function contatti()
    {
        return $this->hasOne(Contatto::class, 'idContatto', 'idContatto');
    }

    public function gruppi()
    {
        return $this->hasOne(Gruppo::class, 'idGruppo', 'idGruppo');
    }
}
