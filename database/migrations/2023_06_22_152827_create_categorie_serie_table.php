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
        Schema::create('categorie_serie', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idSerie');
            $table->unsignedBigInteger('idCategoria')->nullable();

            $table->timestamps();

            $table->foreign('idSerie')->references('idSerie')->on('serie_tv');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');

            $table->primary(['idSerie', 'idCategoria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie_serie');
    }
};
