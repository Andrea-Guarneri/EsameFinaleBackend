<?php

namespace Database\Seeders;

use App\Models\Stato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stato::create(["idStato" => 1, "idContatto" => 1, "nome" => "attivo"]);
        Stato::create(["idStato" => 2, "idContatto" => 2, "nome" => "bannato"]);
    }
}
