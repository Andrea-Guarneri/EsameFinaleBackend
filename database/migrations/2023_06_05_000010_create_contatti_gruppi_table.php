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
        Schema::create('contatti_gruppi', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idContatto');
            $table->unsignedBigInteger('idGruppo');
            $table->timestamps();
            $table->foreign("idContatto")->references("idContatto")->on("contatti");
            $table->foreign("idGruppo")->references("idGruppo")->on("gruppi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_gruppi');
    }
};
