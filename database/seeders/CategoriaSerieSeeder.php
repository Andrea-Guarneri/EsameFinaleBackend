<?php

namespace Database\Seeders;

use App\Models\CategoriaSerie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaSerie::create(["idSerie" => 1, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 2, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 3, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 4, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 5, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 6, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 7, "idCategoria" => 1]);
        CategoriaSerie::create(["idSerie" => 8, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 9, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 10, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 11, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 12, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 13, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 14, "idCategoria" => 2]);
        CategoriaSerie::create(["idSerie" => 15, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 16, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 17, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 18, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 19, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 20, "idCategoria" => 3]);
        CategoriaSerie::create(["idSerie" => 21, "idCategoria" => 3]);
    }
}
