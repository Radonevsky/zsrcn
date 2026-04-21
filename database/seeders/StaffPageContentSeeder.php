<?php

namespace Database\Seeders;

use App\Models\StaffPageContent;
use Illuminate\Database\Seeder;

class StaffPageContentSeeder extends Seeder
{
    public static function defaults(): array
    {
        return require __DIR__.'/defaults/staff_page_defaults.php';
    }

    public function run(): void
    {
        if (StaffPageContent::query()->exists()) {
            return;
        }

        StaffPageContent::query()->create(self::defaults());
    }
}
