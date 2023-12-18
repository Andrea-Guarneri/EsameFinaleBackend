<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contatti', function (Blueprint $table) {
            $table->id('idContatto');
            $table->unsignedBigInteger('idStato');
            $table->string('nome', 45)->nullable();
            $table->string('cognome', 45);
            $table->unsignedTinyInteger('sesso')->nullable();
            $table->string('codiceFiscale', 16);
            $table->string('partitaIva', 45)->nullable();
            $table->string('cittadinanza', 45)->nullable();
            $table->unsignedBigInteger('idNazione');
            $table->string('cittaNascita', 45)->nullable();
            $table->string('provinciaNascita', 45)->nullable();
            $table->date('dataNascita');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
            $table->foreign('idStato')->references('idStato')->on('stati');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti');
    }
};
