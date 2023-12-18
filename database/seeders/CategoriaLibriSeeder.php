<?php

namespace Database\Seeders;

use App\Models\CategoriaLibro;
use Illuminate\Database\Seeder;

class CategoriaLibriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaLibro::create(["idCategoriaLibro" => 1, "nome" => "Fantascienza"]);
        CategoriaLibro::create(["idCategoriaLibro" => 2, "nome" => "Fantasy"]);
        CategoriaLibro::create(["idCategoriaLibro" => 3, "nome" => "Avventura"]);
    }
}
