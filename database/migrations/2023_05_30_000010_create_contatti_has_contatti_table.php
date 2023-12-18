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
        Schema::create('contatti_has_contatti', function (Blueprint $table) {
            $table->id('idContattoPadre');
            $table->unsignedBigInteger('idContatto');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("idContatto")->references("idContatto")->on("contatti");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_has_contatti');
    }
};
