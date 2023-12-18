<?php

namespace Database\Seeders;

use App\Models\GruppoAbilita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruppiAbilitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GruppoAbilita::create(["idGruppoAbilita" => 1, "idAbilita" => 1, "idGruppo" => 1]);
        GruppoAbilita::create(["idGruppoAbilita" => 2, "idAbilita" => 2, "idGruppo" => 1]);
        GruppoAbilita::create(["idGruppoAbilita" => 3, "idAbilita" => 3, "idGruppo" => 1]);
        GruppoAbilita::create(["idGruppoAbilita" => 4, "idAbilita" => 4, "idGruppo" => 1]);
        GruppoAbilita::create(["idGruppoAbilita" => 5, "idAbilita" => 1, "idGruppo" => 2]);
        GruppoAbilita::create(["idGruppoAbilita" => 6, "idAbilita" => 3, "idGruppo" => 2]);
    }
}
