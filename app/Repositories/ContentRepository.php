<?php

namespace App\Repositories;

use App\Models\AvailableContent;
use Illuminate\Support\Facades\Log;



class ContentRepository
{
    public function getAvailableContent(): AvailableContent
    {
        try {
            return AvailableContent::query()->first();
        } catch (\Exception $e) {
                Log::error('Error: ' . $e->getMessage());
                throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function updateAvailableContent($data): string
    {
        try {
            $content = AvailableContent::query()->first();

            $content->update_date = $data['update_date'];
            $content->count = $data['count'];
            $content->free_count = $data['free_count'];

            $content->save();

            return $content;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }
}
