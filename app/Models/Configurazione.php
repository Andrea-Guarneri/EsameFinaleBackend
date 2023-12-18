<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Configurazione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "configurazioni";

    protected $primaryKey = "idConfigurazione";

    protected $fillable = [
        "idConfigurazione",
        "chiave",
        "valore"
    ];

    public static function leggiValore(string $key)
    {
        $risultato = DB::table('configurazioni')->where('chiave', $key)->first();

        return $risultato ? $risultato->valore : null;
    }
}