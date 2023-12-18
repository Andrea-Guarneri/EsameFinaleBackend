<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contatto;
use Carbon\Carbon;

class ContattoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contatto::create([
            "idContatto" => 1,
            "nome" => "Andrea",
            "cognome" => "Guarneri",
            "sesso" => 0,
            "idStato" => 1,
            "codiceFiscale" => "cpzfrc95b21a944q",
            "cittadinanza" => "italiana",
            "idNazione" => 1,
            "cittaNascita" => "Bologna",
            "provinciaNascita" => "Bologna",
            "dataNascita" => Carbon::parse("1995-02-21")
        ]);
        Contatto::create([
            "idContatto" => 2,
            "nome" => "Luca",
            "cognome" => "Verdi",
            "sesso" => 0,
            "idStato" => 1,
            "codiceFiscale" => "cpzfrc95b21a944c",
            "cittadinanza" => "italiana",
            "idNazione" => 1,
            "cittaNascita" => "Milano",
            "provinciaNascita" => "Milano",
            "dataNascita" => Carbon::parse("1995-02-21")


        ]);
        Contatto::create([
            "idContatto" => 3,
            "nome" => "Sara",
            "cognome" => "Prima",
            "sesso" => 1,
            "idStato" => 1,
            "codiceFiscale" => "cpzfrc95b21a944b",
            "cittadinanza" => "italiana",
            "idNazione" => 1,
            "cittaNascita" => "Torino",
            "provinciaNascita" => "Torino",
            "dataNascita" => Carbon::parse("1995-02-21")
        ]);
    }
}
