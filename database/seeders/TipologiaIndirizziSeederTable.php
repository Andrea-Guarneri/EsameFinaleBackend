<?php

namespace Database\Seeders;

use App\Models\TipologiaIndirizzo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologiaIndirizziSeederTable extends Seeder
{
    public function run(): void
    {
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 1, "nome" => "Residenza"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 2, "nome" => "Domicilio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 3, "nome" => "Indirizzo spedizioni"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 4, "nome" => "Ufficio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 5, "nome" => "Sede legale"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 6, "nome" => "Sede operativa"]);
    }
}
