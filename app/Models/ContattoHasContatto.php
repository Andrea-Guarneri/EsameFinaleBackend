<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContattoHasContatto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "contatti_has_contatti";
    protected $primaryKey = "idContattoPadre";

    protected $fillable = [
        "idContatto"
    ];
    public function contattoHasContatto()
    {
        return $this->belongsTo(ContattoHasContatto::class, 'idContatto', 'idContatto');
    }
}
