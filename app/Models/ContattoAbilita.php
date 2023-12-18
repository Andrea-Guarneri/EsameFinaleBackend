<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContattoAbilita extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idAbilita";
    protected $table= "contatto_abilita";

    protected $fillable = [
        'idAbilita',
        'nome',
        'potere'
    ];
}
