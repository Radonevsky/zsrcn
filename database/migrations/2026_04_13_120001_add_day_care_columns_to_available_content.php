<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('available_content', function (Blueprint $table) {
            $table->string('day_care_count', 50)->default('0')->after('free_count');
            $table->string('day_care_free_count', 50)->default('0')->after('day_care_count');
        });

        DB::table('available_content')->update([
            'day_care_count' => '0',
            'day_care_free_count' => '0',
        ]);
    }

    public function down(): void
    {
        Schema::table('available_content', function (Blueprint $table) {
            $table->dropColumn(['day_care_count', 'day_care_free_count']);
        });
    }
};
