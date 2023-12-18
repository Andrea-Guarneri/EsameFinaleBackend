<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lingua extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lingue";

    protected $primaryKey = "idLingua";

    protected $fillable = [
        "nome",
        "abbreviazione",
        "locale"
    ];

    public function elencoTraduzioni()
    {
        return $this->hasMany(Traduzione::class, 'idLingua', 'idLingua');
    }
    public function elencoTraduzioniCustom()
    {
        return $this->hasMany(TraduzioneCustom::class, 'idLingua', 'idLingua');
    }
}
