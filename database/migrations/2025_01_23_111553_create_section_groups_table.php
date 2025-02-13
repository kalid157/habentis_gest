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
        Schema::create('section_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // e.g., 'Group A', 'Morning Batch'
            $table->unsignedBigInteger('formation_id'); // To associate with specific formations
            $table->timestamps();

            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade'); // Assuming you have a 'formations' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_groups');
    }
};
