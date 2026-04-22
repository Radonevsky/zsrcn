<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_services_page_content', function (Blueprint $table) {
            $table->text('round_clock_text')->nullable()->after('regulation_text');
            $table->json('center_info_items')->nullable()->after('round_clock_text');
        });
    }

    public function down(): void
    {
        Schema::table('social_services_page_content', function (Blueprint $table) {
            $table->dropColumn(['round_clock_text', 'center_info_items']);
        });
    }
};
