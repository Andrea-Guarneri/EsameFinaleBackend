<?php

namespace Database\Seeders;

use App\Models\Accesso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accesso::create(["idAccesso" => 1, "idContatto" => 1, "autenticato" => 1, "ip" => "127.0.0.1"]);
    }
}
