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
        Schema::create('developpeurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('formation');
            $table->string('session');
            $table->integer('tranche1');           
            $table->integer('tranche2');           
            $table->integer('tranche3');           
            $table->integer('tranche4');           
            $table->integer('montant');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developpeurs');
    }
};
