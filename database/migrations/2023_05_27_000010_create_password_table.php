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
        Schema::create('password', function (Blueprint $table) {
            $table->id('idPassword');
            $table->unsignedBigInteger('idContatto');
            $table->string('psw', 255);
            $table->string('sale', 255)->nullable();
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
        Schema::dropIfExists('password');
    }
};
