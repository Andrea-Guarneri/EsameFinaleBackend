<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Indirizzo;
use Illuminate\Database\Seeder;

class IndirizzoSeeder extends Seeder
{
    public function run(): void
    {
        Indirizzo::create(
            [
                "idIndirizzo" => 3,
                "idContatto" => 1,
                "idTipologiaIndirizzo" => 1,
                "idComuneItaliano" => 5271,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Piazza Roma")),
                "civico" => "100",
                "cap" => 10064,
                "localita" =>  hash("sha512", trim("Modena")),
                "preferito" => 0
            ]
        );

        Indirizzo::create(
            [
                "idIndirizzo" => 2,
                "idContatto" => 2,
                "idTipologiaIndirizzo" => 4,
                "idComuneItaliano" => 7291,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Via Veneto")),
                "civico" => "2",
                "cap" => 90144,
                "localita" => hash("sha512", trim("Bologna")),
                "preferito" => 1
            ]
        );

        Indirizzo::create(
            [
                "idIndirizzo" => 1,
                "idContatto" => 1,
                "idTipologiaIndirizzo" => 1,
                "idComuneItaliano" => 7291,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Via Uditore, 22")),
                "civico" => "8/b",
                "cap" => 90145,
                "localita" => hash("sha512", trim("Firenze")),
                "preferito" => 1
            ]
        );
    }
}
