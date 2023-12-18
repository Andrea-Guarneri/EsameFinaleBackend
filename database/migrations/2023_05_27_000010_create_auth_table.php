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
        Schema::create('auth', function (Blueprint $table) {
            $table->id('idAuth');
            $table->unsignedBigInteger('idContatto');
            $table->string('user', 255);
            $table->string('sfida', 255);
            $table->string('secretJWT', 255);
            $table->unsignedInteger('inizioSfida');
            $table->unsignedTinyInteger('mustChange')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idContatto')->references('idContatto')->on('contatti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth');
    }
};
