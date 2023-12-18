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
        Schema::create('categorie', function (Blueprint $table) {
            $table->id('idCategoria');
            $table->string('nome', 45);
            $table->text('srcImmagine');
            $table->text('descrizione');
            $table->unsignedTinyInteger('watch')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->index('watch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie');
    }
};
