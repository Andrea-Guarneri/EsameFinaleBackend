<?php

namespace Database\Seeders;

use App\Models\Sessione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sessione::create(["idSessione" => 1, "idContatto" => 1, "token" => hash("sha512", trim("userClient")), "inizioSessione" => time()]);
    }
}
