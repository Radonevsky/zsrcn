<?php

namespace Database\Seeders;

use App\Models\SocialServicesPageContent;
use Illuminate\Database\Seeder;

class SocialServicesPageContentSeeder extends Seeder
{
    public static function defaultRoundClockText(): string
    {
        return 'Учреждение работает в круглосуточном режиме.';
    }

    /**
     * @return list<array{id: int|string, title: string, content: string}>
     */
    public static function defaultCenterInfoItems(): array
    {
        return require __DIR__ . '/defaults/social_services_center_info.php';
    }

    public static function defaults(): array
    {
        return [
            'regulation_text' => 'Постановление Правительства РБ от 17.07.2015 N 361 "Об утверждении порядков предоставления социальных услуг несовершеннолетним гражданам в Республике Бурятия" (вместе с "Порядком предоставления социальных услуг несовершеннолетним гражданам в стационарной форме социального обслуживания в Республике Бурятия", "Порядком предоставления социальных услуг несовершеннолетним гражданам в полустационарной форме социального обслуживания в Республике Бурятия", "Порядком предоставления социальных услуг несовершеннолетним гражданам в форме социального обслуживания на дому в Республике Бурятия")',
            'round_clock_text' => self::defaultRoundClockText(),
            'center_info_items' => self::defaultCenterInfoItems(),
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
