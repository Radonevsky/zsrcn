<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citizen_appeals_page_content', function (Blueprint $table) {
            $table->id();
            $table->json('schedule_rows');
            $table->json('legal_basis_items');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citizen_appeals_page_content');
    }
};
