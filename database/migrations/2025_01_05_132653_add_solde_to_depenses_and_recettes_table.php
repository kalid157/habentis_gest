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
        Schema::table('depenses', function (Blueprint $table) {
            $table->decimal('solde', 10, 2)->default(0)->after('montant');
        });
         Schema::table('recettes', function (Blueprint $table) {
            $table->decimal('solde', 10, 2)->default(0)->after('montant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropColumn('solde');
          });
           Schema::table('recettes', function (Blueprint $table) {
            $table->dropColumn('solde');
          });
    }
};
