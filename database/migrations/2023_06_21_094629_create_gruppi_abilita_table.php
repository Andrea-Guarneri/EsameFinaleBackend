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
        Schema::create('gruppi_abilita', function (Blueprint $table) {
            $table->id('idGruppoAbilita');
            $table->unsignedBigInteger('idAbilita');
            $table->unsignedBigInteger('idGruppo');
            $table->timestamps();
            $table->foreign('idAbilita')->references('idAbilita')->on('contatto_abilita');
            $table->foreign('idGruppo')->references('idGruppo')->on('gruppi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gruppi_abilita');
    }
};
