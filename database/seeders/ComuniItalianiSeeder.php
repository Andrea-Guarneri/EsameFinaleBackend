<?php

namespace Database\Seeders;

use App\Models\ComuneItaliano;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComuniItalianiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuniItaliani.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            ComuneItaliano::create(
                [
                    "idComuneItaliano" => $data[0],
                    "nome" => $data[1],
                    "regione" => $data[2],
                    "provincia" => $data[3],
                    "metropolitana" => $data[4],
                    "siglaAutomobilistica" => $data[5],
                    "codiceCatastale" => $data[6],
                    "multicap" => $data[7],
                    "capoluogo" => $data[8],
                    "cap" => $data[9],
                    "capFine" => $data[10],
                    "capInizio" => $data[11],
                ]
            );
        }
    }
}
