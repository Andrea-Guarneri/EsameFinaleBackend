<?php

namespace Database\Seeders;

use App\Models\Credito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Credito::create(["idCredito" => 1, "idContatto" => 1, "credito" => 100000]);
    }
}
