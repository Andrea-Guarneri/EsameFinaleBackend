<?php

namespace Database\Seeders;

use App\Models\Password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Password::create(["idPassword" => 1, "idContatto" => 1, "psw" => hash("sha512", trim("123456")), "sale" => hash("sha512", trim("sale"))]);
        Password::create(["idPassword" => 2, "idContatto" => 2, "psw" => hash("sha512", trim("800A")), "sale" => hash("sha512", trim("sale"))]);
    }
}
