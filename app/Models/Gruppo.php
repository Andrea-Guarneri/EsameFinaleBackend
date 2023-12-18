<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gruppo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "gruppi";

    protected $primaryKey = "idGruppo";

    protected $fillable = [
        "idGruppo",
        "idContatto",
        "nome"
    ];

    public static function aggiornaRuoloAbilita($idUserRole, $idUserAbility)
    {
        $role = Gruppo::where("idGruppo", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $role->ability()->attach($tmp);
        return $role->ability;
    }
    /****************************************************************************** */

    // ----------------------------------------------------------------------------------------------------------
    /**
     * Elimina le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     *
     * @param integer $idCRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function eliminaRuoloAbilita($idUserRole, $idUserAbility)
    {
        $role = Gruppo::where("idGruppo", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $role->ability()->detach($tmp);
        return $role->ability;
    }
    // ----------------------------------------------------------------------------------------------------------
    /**
     * Sincronizza le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     *
     * @param integer $idCRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function sincronizzaRuoloAbilita($idUserRole, $idUserAbility)
    {
        $ruolo = Gruppo::where("idGruppo", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $ruolo->ability()->sync($tmp);
        return $ruolo->ability;
    }
    // ----------------------------------------------------------------------------------------------------------



    // aisartag aggiunta relationship
    public function contattiAbilita(): BelongsToMany
    {
        return $this->belongsToMany(ContattoAbilita::class, 'gruppi_abilita', 'idGruppo', 'idAbilita');
    }
}
