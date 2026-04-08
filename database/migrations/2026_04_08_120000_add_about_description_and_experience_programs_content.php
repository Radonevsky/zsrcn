<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_description_content', function (Blueprint $table) {
            $table->id();
            $table->longText('html');
            $table->timestamps();
        });

        Schema::table('experience_content', function (Blueprint $table) {
            $table->text('programs_content')->nullable()->after('content');
        });

        $defaultPrograms = trim(<<<'TXT'
            Разработана и реализуется программа развития учреждения «Взгляд в будущее» 2022-2025 гг.,
            реализованы рабочие программы кружковой деятельности педагогов: «Подружка», «Мир книги», «Музыкальная капель»,
            «Здоровей-ка», «Путевка в жизнь», «Я познаю мир», «Декоративно-прикладное искусство «Фантазия» , «Наши руки не для скуки»,
            программа по социализации подростков, волонтерское движение «Шаг вперед». В 2017 году в рамках реализации благотворительной
            программы «С любовью к детям» реализуемой совместно и при поддержке Благотворительного фонда компании «Амвэй»
            «В ответе за будущее», Фонд поддержки и развития филантропии «КАФ» проводили открытый конкурс проектов «С любовью к детям»,
            нами был написан и реализован грантовый проект «Солнышко в ладошках» на сумму 870тыс. рублей., благодаря которому усовершенствовалась
            работа по сопровождению замещающих семей.
        TXT);

        DB::table('experience_content')->whereNull('programs_content')->update(['programs_content' => $defaultPrograms]);
    }

    public function down(): void
    {
        Schema::table('experience_content', function (Blueprint $table) {
            $table->dropColumn('programs_content');
        });

        Schema::dropIfExists('about_description_content');
    }
};
