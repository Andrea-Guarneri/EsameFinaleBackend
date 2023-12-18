<?php

namespace Database\Seeders;

use App\Models\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auth::create([
            "idAuth" => 1,
            "idContatto" => 1,
            "user" => hash("sha512", trim("guarneri.work@gmail.com")),
            "sfida" => hash('sha512', trim('Sfida')),
            "secretJWT" => hash("sha512", trim("Secret")),
            "inizioSfida" => time()
        ]);

        Auth::create([
            "idAuth" => 2,
            "idContatto" => 2,
            "user" => hash("sha512", trim("crash.bandicoot@gmail.com")),
            "sfida" => hash('sha512', trim('Sfida')),
            "secretJWT" => hash("sha512", trim("Secret")),
            "inizioSfida" => time()
        ]);
    }
}
