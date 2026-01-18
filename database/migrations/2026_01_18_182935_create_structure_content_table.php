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
        Schema::create('structure_content', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description')->nullable(); // Current text description
            $table->json('org_chart_data')->nullable(); // Future: for editable org chart structure
            $table->json('additional_data')->nullable(); // Future: for any other extensions
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_content');
    }
};
