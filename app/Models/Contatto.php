<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as ClassePerGate;

class Contatto extends ClassePerGate
{
    use HasFactory, SoftDeletes;

    protected $table = "contatti";
    protected $primaryKey = "idContatto";

    protected $fillable = [
        "idContatto",
        "idStato",
        "nome",
        "cognome",
        "sesso",
        "codiceFiscale",
        "partitaIva",
        "cittadinanza",
        "idNazione",
        "cittaNascita",
        "provinciaNascita",
        "dataNascita",
    ];

    /**
     * aggiungi contatto ruoli
     *
     * @return collection
     */
    public static function aggiungiContattoRuoli($idContatto, $idGruppo)
    {
        $contatto = Contatto::where('idContatto', $idContatto)->firstOrFail();
        if (is_string($idGruppo)) {
            $tmp = explode(',', $idGruppo);
        } else {
            $tmp = $idGruppo;
        }
        $contatto->ruoli()->attach($tmp);
        return $contatto->ruoli;
    }


    public static function eliminaContattoRuoli($idContatto, $idGruppo)
    {
        $contatto = Contatto::where('idContatto', $idContatto)->firstOrFail();
        if (is_string($idGruppo)) {
            $tmp = explode(',', $idGruppo);
        } else {
            $tmp = $idGruppo;
        }
        $contatto->ruoli()->detach($tmp);
        return $contatto->gruppi;
    }

    public function elencoContatti()
    {
        return $this->belongsTo(Nazione::class, 'idNazione', 'idNazione');
    }
    public function elencoFilmHasContatto2()
    {
        return $this->hasMany(FilmHasContatto::class, 'idContatto', 'idContatto');
    }

    public function sessione()
    {
        return $this->hasOne(Sessione::class, 'idContatto', 'idContatto');
    }
    public function credito()
    {
        return $this->hasOne(Credito::class, 'idContatto', 'idContatto');
    }
    public function auth()
    {
        return $this->hasOne(Auth::class, 'idContatto', 'idContatto');
    }
    public function elencoStati()
    {
        return $this->belongsTo(Stato::class, 'idStato', 'idStato');
    }


    public function gruppi() : BelongsToMany
    {
        return $this->belongsToMany(Gruppo::class, 'contatti_gruppi', 'idContatto', 'idGruppo');
    }
    public function elencoIndirizziContatto()
    {
        return $this->hasMany(Indirizzo::class, 'idContatto', 'idContatto');
    }
    public function elencoPassword()
    {
        return $this->hasMany(Password::class, 'idContatto', 'idContatto');
    }
    public function contattoHasContatto()
    {
        return $this->hasMany(ContattoHasContatto::class, 'idContatto', 'idContatto');
    }
    public function elencoRecapiti()
    {
        return $this->hasMany(Recapito::class, 'idContatto', 'idContatto');
    }
}
