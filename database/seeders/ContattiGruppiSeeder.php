<?php

namespace Database\Seeders;

use App\Models\ContattoGruppo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattiGruppiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoGruppo::create(["id" => 1, "idContatto" => 1, "idGruppo" => 1]);
        ContattoGruppo::create(["id" => 2, "idContatto" => 2, "idGruppo" => 2]);
        ContattoGruppo::create(["id" => 3, "idContatto" => 3, "idGruppo" => 3]);
    }
}
