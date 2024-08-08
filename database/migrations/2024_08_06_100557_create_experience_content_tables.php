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
        Schema::create('experience_table_content', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('returned_to_family');
            $table->integer('family_welfare');
            $table->integer('sent_to_educational_institutions');
            $table->integer('other_forms');
            $table->timestamps();
        });

        Schema::create('experience_content', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_table_content');
        Schema::dropIfExists('experience_content');
    }
};
