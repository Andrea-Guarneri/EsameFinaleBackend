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
        Schema::create('accessi', function (Blueprint $table) {
            $table->id('idAccesso');
            $table->unsignedBigInteger('idContatto');
            $table->unsignedTinyInteger('autenticato');
            $table->string('ip', 15)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("idContatto")->references("idContatto")->on("contatti");
            $table->index('autenticato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessi');
    }
};
