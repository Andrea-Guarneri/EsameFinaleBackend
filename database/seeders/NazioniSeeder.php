<?php

namespace Database\Seeders;

use App\Models\Nazione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NazioniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/nazioni.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            Nazione::create(
                [
                    "idNazione" => $data[0],
                    "nome" => $data[1],
                    "continente" => $data[2],
                    "iso" => $data[3],
                    "iso3" => $data[4],
                    "prefissoTelefonico" => $data[5],
                ]
            );
        }
    }
}
