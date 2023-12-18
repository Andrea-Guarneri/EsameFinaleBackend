<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruppoAbilita extends Model
{
    use HasFactory;
    protected $primaryKey = "idGruppoAbilita";
    protected $table = "gruppi_abilita";

    protected $fillable = [
        'idGruppoAbilita',
        'idAbilita',
        'idGruppo'
    ];

    public function contatto_abilita()
    {
        return $this-> hasMany(ContattoAbilita::class, 'idAbilita', 'idAbilita');
    }

    public function gruppi()
    {
        return $this-> hasMany(Gruppo::class, 'idGruppo', 'idGruppo');
    }

}
