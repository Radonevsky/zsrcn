<?php

namespace Database\Seeders;

use App\Models\SocialServicesPageContent;
use Illuminate\Database\Seeder;

class SocialServicesPageContentSeeder extends Seeder
{
    public static function defaults(): array
    {
        return [
            'regulation_text' => 'Постановление Правительства РБ от 17.07.2015 N 361 "Об утверждении порядков предоставления социальных услуг несовершеннолетним гражданам в Республике Бурятия" (вместе с "Порядком предоставления социальных услуг несовершеннолетним гражданам в стационарной форме социального обслуживания в Республике Бурятия", "Порядком предоставления социальных услуг несовершеннолетним гражданам в полустационарной форме социального обслуживания в Республике Бурятия", "Порядком предоставления социальных услуг несовершеннолетним гражданам в форме социального обслуживания на дому в Республике Бурятия")',
        ];
    }

    public function run(): void
    {
        if (SocialServicesPageContent::query()->exists()) {
            return;
        }

        SocialServicesPageContent::query()->create(self::defaults());
    }
}
