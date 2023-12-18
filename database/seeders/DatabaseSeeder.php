<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                CategoriaLibriSeeder::class,
                CategoriaSeeder::class,
                NazioniSeeder::class,
                ComuniItalianiSeeder::class,
                StatoSeeder::class,
                GruppoSeeder::class,
                ContattoSeeder::class,
                ProvinciaSeeder::class,
                TipologiaIndirizziSeeder::class,
                FilmSeeder::class,
                SerieTvSeeder::class,
                EpisodioSeeder::class,
                LinguaSeeder::class,
                TipologiaRecapitoSeeder::class,
                RecapitoSeeder::class,
                ConfigurazioniSeeder::class,
                CategoriaSerieSeeder::class,
                CategoriaFilmSeeder::class,
                AccessoSeeder::class,
                AuthSeeder::class,
                ContattiGruppiSeeder::class,
                ContattoAbilitaSeeder::class,
                CreditiSeeder::class,
                GruppiAbilitaSeeder::class,
                IndirizzoSeeder::class,
                PasswordSeeder::class,
                SessionSeeder::class
            ]
        );
    }
}
