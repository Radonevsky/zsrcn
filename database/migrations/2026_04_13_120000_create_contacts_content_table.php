<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(0);
            $table->text('department');
            $table->string('work_time', 255);
            $table->text('role_info');
            $table->string('phone', 255);
            $table->string('email', 255)->default('gusonat@mail.ru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts_content');
    }
};
