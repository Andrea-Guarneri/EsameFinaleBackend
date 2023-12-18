<?php

namespace Database\Seeders;

use App\Models\Lingua;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinguaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lingua::create(["idLingua" => 1, "nome" => "italiano", "abbreviazione" => "ita", "locale" => "???"]);
        Lingua::create(["idLingua" => 2, "nome" => "Inglese", "abbreviazione" => "eng", "locale" => "???"]);
        Lingua::create(["idLingua" => 3, "nome" => "Francese", "abbreviazione" => "fra", "locale" => "???"]);
    }
}
