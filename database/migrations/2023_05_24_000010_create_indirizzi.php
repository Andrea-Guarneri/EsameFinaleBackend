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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id('idIndirizzo');
            $table->unsignedBigInteger('idContatto');
            $table->unsignedBigInteger('idTipologiaIndirizzo');
            $table->unsignedBigInteger('idComuneItaliano')->nullable();
            $table->unsignedBigInteger('idNazione');
            $table->string('cap', 15)->nullable();
            $table->string('indirizzo', 255);
            $table->string('civico', 15)->nullable();
            $table->string('localita', 255)->nullable();
            $table->integer('preferito')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idTipologiaIndirizzo')->references('idTipologiaIndirizzo')->on('tipologia_indirizzi');
            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
            $table->foreign("idContatto")->references("idcontatto")->on("contatti");
            $table->foreign("idComuneItaliano")->references("idComuneItaliano")->on("comuni_italiani");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};
