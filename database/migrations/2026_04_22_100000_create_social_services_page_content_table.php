<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_services_page_content', function (Blueprint $table) {
            $table->id();
            $table->longText('regulation_text');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_services_page_content');
    }
};
