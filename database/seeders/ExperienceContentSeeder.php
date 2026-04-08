<?php

namespace Database\Seeders;

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
        $programs = <<<'TXT'
Разработана и реализуется программа развития учреждения «Взгляд в будущее» 2022-2025 гг.,
реализованы рабочие программы кружковой деятельности педагогов: «Подружка», «Мир книги», «Музыкальная капель»,
«Здоровей-ка», «Путевка в жизнь», «Я познаю мир», «Декоративно-прикладное искусство «Фантазия» , «Наши руки не для скуки»,
программа по социализации подростков, волонтерское движение «Шаг вперед». В 2017 году в рамках реализации благотворительной
программы «С любовью к детям» реализуемой совместно и при поддержке Благотворительного фонда компании «Амвэй»
«В ответе за будущее», Фонд поддержки и развития филантропии «КАФ» проводили открытый конкурс проектов «С любовью к детям»,
нами был написан и реализован грантовый проект «Солнышко в ладошках» на сумму 870тыс. рублей., благодаря которому усовершенствовалась
работа по сопровождению замещающих семей.
TXT;
        DB::table('experience_content')->insert([
            [
                'content' => $content,
                'programs_content' => trim($programs),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
