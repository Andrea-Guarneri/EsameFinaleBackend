<?php

namespace Database\Seeders;

use App\Models\TipologiaIndirizzo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologiaIndirizziSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 1, "nome" => "Residenza vacanza"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 2, "nome" => "Domicilio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 3, "nome" => "Indirizzo spedizioni"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 4, "nome" => "Ufficio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 5, "nome" => "Sede legale"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 6, "nome" => "Sede operativa"]);

    }
}
