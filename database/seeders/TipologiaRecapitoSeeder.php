<?php

namespace Database\Seeders;

use App\Models\TipologiaRecapito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologiaRecapitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipologiaRecapito::create(["idTipoRecapito" => 1, "nome" => "Email"]);
        TipologiaRecapito::create(["idTipoRecapito" => 2, "nome" => "Cellulare"]);
        TipologiaRecapito::create(["idTipoRecapito" => 3, "nome" => "Telefono"]);
        TipologiaRecapito::create(["idTipoRecapito" => 4, "nome" => "WhatsApp"]);
        TipologiaRecapito::create(["idTipoRecapito" => 5, "nome" => "Telegram"]);
        TipologiaRecapito::create(["idTipoRecapito" => 6, "nome" => "Facebook"]);
        TipologiaRecapito::create(["idTipoRecapito" => 7, "nome" => "Instagram"]);
        TipologiaRecapito::create(["idTipoRecapito" => 8, "nome" => "Linkedin"]);
        TipologiaRecapito::create(["idTipoRecapito" => 9, "nome" => "Twitter"]);
    }
}
