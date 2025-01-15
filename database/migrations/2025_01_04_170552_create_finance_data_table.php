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
        Schema::create('finance_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_sum', 10, 2)->default(0);
            $table->json('outgoing_amounts')->nullable(); // Store as JSON: {student_id : amount}
            $table->integer('total_students')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_data');
    }
};
