<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "utenti";
    protected $primaryKey = "idUtente";

    protected $fillable = [
        "nome",
        "cognome",
        "sesso",
        "created_at",
        "updated_at",        
    ];
}
