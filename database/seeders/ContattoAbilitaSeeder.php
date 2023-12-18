<?php

namespace Database\Seeders;

use App\Models\ContattoAbilita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoAbilitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoAbilita::create(["idAbilita" => 1, "nome" => "Leggere", "potere" => "leggere"]);
        ContattoAbilita::create(["idAbilita" => 2, "nome" => "Creare", "potere" => "creare"]);
        ContattoAbilita::create(["idAbilita" => 3, "nome" => "Aggiornare", "potere" => "aggiornare"]);
        ContattoAbilita::create(["idAbilita" => 4, "nome" => "Eliminare", "potere" => "eliminare"]);
    }
}
