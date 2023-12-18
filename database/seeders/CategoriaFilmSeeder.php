<?php

namespace Database\Seeders;

use App\Models\CategoriaFilm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaFilm::create(["idFilm" => 1, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 2, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 3, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 4, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 5, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 6, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 7, "idCategoria" => 1]);
        CategoriaFilm::create(["idFilm" => 8, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 9, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 10, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 11, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 12, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 13, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 14, "idCategoria" => 2]);
        CategoriaFilm::create(["idFilm" => 15, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 16, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 17, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 18, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 19, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 20, "idCategoria" => 3]);
        CategoriaFilm::create(["idFilm" => 21, "idCategoria" => 3]);
    }
}
