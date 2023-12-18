<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuniItaliani.csv");
        $file = fopen($csv, "r");

        $province = array();

        while (($data = fgetcsv($file, 200, ",")) !== false) {
            // verifica se la chiave esiste già in array $province
            $key = $data[2];

            if (!array_key_exists($key, $province)) {
                // Aggiungi la chiave all'array $provincie
                $province[$key] = count($province) + 1;
                Provincia::create(["idProvincia" => count($province), "nome" => $key]);
            }
            // Se la chiave esiste già, non fare nulla e continuare con l'iterazione successiva
        }

        // Visualizzazione dell'array finale
        print_r($province);
    }
}
