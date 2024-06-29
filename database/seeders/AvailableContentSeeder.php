<?php

namespace Database\Seeders;

use App\Models\AvailableContent;
use Illuminate\Database\Seeder;

class AvailableContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AvailableContent::firstOrCreate([
            'update_date' => '-',
            'count' => '-',
            'free_count' => '-',
        ]);
    }
}
