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
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->unsignedTinyInteger('durata')->nullable();
            $table->string('regista', 100);
            $table->string('attori', 255);
            $table->unsignedSmallInteger('anno');
            $table->text('srcImmagine')->nullable();
            $table->text('srcFilmato')->nullable();
            $table->text('srcBanner')->nullable();
            $table->unsignedInteger('watch')->nullable()->default(0);
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
        Schema::dropIfExists('film');
    }
};
