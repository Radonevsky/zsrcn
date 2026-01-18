<?php

namespace Database\Seeders;

use App\Models\StructureContent;
use Illuminate\Database\Seeder;

class StructureContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = "В центре функционируют:\n\n" .
            "1.Приёмно-карантинное отделение\n" .
            "(рассчитано на 8 мест). Все дети, поступающие в центр, проходят через приёмно-карантинное отделение.\n\n" .
            "2.Стационарное отделение (рассчитано на 34 места)\n\n" .
            "3.Отделение службы сопровождения замещающих семей, создано в 2009 года. В рамках работы службы функционирует\n" .
            "Школа приёмных родителей и Клуб замещающих родителей «Тепло домашнего очага»";

        StructureContent::create([
            'description' => $description,
            'org_chart_data' => null, // Will be used in future for editable org chart
            'additional_data' => null, // For any future extensions
        ]);
    }
}
