<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Contatto;
use App\Models\ContattoAbilita;
use App\Models\Gruppo;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        if (Schema::hasTable("gruppi")) {
            // GATE ROLE
            Gruppo::all()->each( //con each cicliamo tutti i ruoli
                function (Gruppo $gruppo) {
                    Gate::define($gruppo->nome, function (Contatto $contatto) use ($gruppo) {
                        return $contatto->gruppi->contains('nome', $gruppo->nome);
                    });
                }
            );

            // GATE basato su multipli ruoli
            ContattoAbilita::all()->each(function (ContattoAbilita $abilita) {
                Gate::define($abilita->potere, function (Contatto $contatto) use ($abilita) {
                    $check = false; // setto un check che se nel foreach non succede nulla mi ritornerà false
                    foreach ($contatto->gruppi as $item) {
                        if ($item->contattiAbilita->contains('potere', $abilita->potere)) {
                            $check = true;
                            break; // se trovo l'abilità stoppo il ciclo e vado oltre fermando tutto con il break
                        }
                    }
                    return $check;
                });
            });
        }
    }
}
