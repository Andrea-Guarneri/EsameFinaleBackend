<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(["idCategoria" => 1, "nome" => "Horror", "srcImmagine" => "https://wallpaper.dog/large/20491976.jpg", "descrizione" => "Explore the uncharted, where fear becomes art, in our captivating Horror collection, full of mysteries and emotions that transcend fear with courage."]);
        Categoria::create(["idCategoria" => 2, "nome" => "Action", "srcImmagine" => "https://r4.wallpaperflare.com/wallpaper/478/888/1024/keanu-reeves-john-wick-gun-movies-wallpaper-3bd61c0d53519f9905b4cb694d9cdc90.jpg", "descrizione" => "Embark on a journey of pure adrenaline with our Action category, where each scene is an explosion of excitement and courage, transforming action into art."]);
        Categoria::create(["idCategoria" => 3, "nome" => "Animation", "srcImmagine" => "https://wallpapers.com/images/hd/marvel-war-shwpybdqa5l1keuv.jpg", "descrizione" => "Step into the enchanted realm of Animation, where magical worlds come to life, and enchanted characters take you on adventures that transcend the boundaries of fantasy."]);
    }
}
