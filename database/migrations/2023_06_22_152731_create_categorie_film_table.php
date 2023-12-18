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
        Schema::create('categorie_film', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idCategoria')->nullable();

            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');

            $table->primary(['idFilm', 'idCategoria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie_film');
    }
};
