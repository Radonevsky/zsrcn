<?php

namespace Database\Seeders;

use App\Models\CitizenAppealsPageContent;
use Illuminate\Database\Seeder;

class CitizenAppealsPageContentSeeder extends Seeder
{
    public static function defaults(): array
    {
        return require __DIR__.'/defaults/citizen_appeals_page_defaults.php';
    }

    public function run(): void
    {
        if (CitizenAppealsPageContent::query()->exists()) {
            return;
        }

        CitizenAppealsPageContent::query()->create(self::defaults());
    }
}
