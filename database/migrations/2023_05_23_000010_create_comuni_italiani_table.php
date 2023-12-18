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
        Schema::create('comuni_italiani', function (Blueprint $table) {
            $table->id('idComuneItaliano');
            $table->string('nome', 45);
            $table->string('regione', 45);
            $table->string('provincia', 45);
            $table->string('metropolitana', 45);
            $table->char('siglaAutomobilistica', 2);
            $table->char('codiceCatastale', 4);
            $table->unsignedTinyInteger('multicap');
            $table->unsignedTinyInteger('capoluogo');
            $table->unsignedInteger('cap');
            $table->unsignedInteger('capFine');
            $table->unsignedInteger('capInizio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni_italiani');
    }
};
