<?php

namespace Database\Seeders;

use App\Models\Episodio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episodio::create(["idEpisodio" => 1, "titolo" => "Episodio 1", "idSerie" => 1, "descrizione" => "prova", "numeroEpisodio" => 1, "numeroStagione" => 1, "durata" => 45, "anno" => 2001, "srcImmagine" => 1, "srcFilmato" => 1]);
        Episodio::create(["idEpisodio" => 2, "titolo" => "Episodio 1", "idSerie" => 2, "descrizione" => "prova", "numeroEpisodio" => 1, "numeroStagione" => 1, "durata" => 22, "anno" => 2001, "srcImmagine" => 1, "srcFilmato" => 1]);
        Episodio::create(["idEpisodio" => 3, "titolo" => "Episodio 1", "idSerie" => 3, "descrizione" => "prova", "numeroEpisodio" => 1, "numeroStagione" => 1, "durata" => 25, "anno" => 2001, "srcImmagine" => 1, "srcFilmato" => 1]);
    }
}
