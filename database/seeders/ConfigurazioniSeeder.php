<?php

namespace Database\Seeders;

use App\Models\Configurazione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurazioniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configurazione::create(["idConfigurazione" => 1, "chiave" => "maxLoginErrati", "valore" => 5]);
        Configurazione::create(["idConfigurazione" => 2, "chiave" => "durataSfida", "valore" => 30]);
        Configurazione::create(["idConfigurazione" => 3, "chiave" => "durataSessione", "valore" => 600]);
        Configurazione::create(["idConfigurazione" => 4, "chiave" => "storicoPsw", "valore" => 3]);
    }
}
