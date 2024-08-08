<?php

namespace Database\Seeders;

use App\Models\AvailableContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experience_table_content')->insert([
            [
                'year' => 2019,
                'returned_to_family' => 168,
                'family_welfare' => 23,
                'sent_to_educational_institutions' => 12,
                'other_forms' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2020,
                'returned_to_family' => 163,
                'family_welfare' => 11,
                'sent_to_educational_institutions' => 7,
                'other_forms' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2021,
                'returned_to_family' => 153,
                'family_welfare' => 25,
                'sent_to_educational_institutions' => 39,
                'other_forms' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2022,
                'returned_to_family' => 119,
                'family_welfare' => 19,
                'sent_to_educational_institutions' => 36,
                'other_forms' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2023,
                'returned_to_family' => 157,
                'family_welfare' => 21,
                'sent_to_educational_institutions' => 29,
                'other_forms' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $content = "2019г. - 243 несовершеннолетних\n2020г. - 238 несовершеннолетних\n2021г. - 235 несовершеннолетних\n2022г. - 203 несовершеннолетних\n2023г. - 242 несовершеннолетних";
        DB::table('experience_content')->insert([
            [
                'content' => $content,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
