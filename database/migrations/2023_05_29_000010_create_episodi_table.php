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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerie');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->unsignedInteger('numeroStagione');
            $table->unsignedInteger('numeroEpisodio');
            $table->unsignedInteger('durata');
            $table->unsignedSmallInteger('anno');
            $table->text('srcImmagine')->nullable();
            $table->text('srcFilmato')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("idSerie")->references("idSerie")->on("serie_tv");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};
