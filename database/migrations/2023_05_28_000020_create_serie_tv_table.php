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
        Schema::create('serie_tv', function (Blueprint $table) {
            $table->id('idSerie');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->unsignedInteger('totaleStagioni');
            $table->unsignedInteger('numeroEpisodio');
            $table->string('regista', 255);
            $table->string('attori', 255);
            $table->unsignedSmallInteger('annoInizio');
            $table->unsignedSmallInteger('annoFine')->nullable();
            $table->text('srcImmagine')->nullable();
            $table->text('srcFilmato')->nullable();
            $table->text('srcBanner')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_tv');
    }
};
