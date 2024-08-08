<?php

namespace App\Repositories;

use App\Models\AvailableContent;
use App\Models\ExperienceContent;
use App\Models\ExperienceTableContent;
use Illuminate\Support\Collection;
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

    public function getExperienceContent(): ExperienceContent
    {
        try {
            return ExperienceContent::query()->first();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function getExperienceTableContent(): Collection
    {
        try {
            return ExperienceTableContent::query()->get();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function updateExperienceContent($data): string
    {
        try {
            $experienceContent = ExperienceContent::query()->first();
            $experienceContent->content = $data['content'];
            $experienceContent->save();

            return $data['content'];
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    public function updateExperienceTableContent(array $data): bool
    {
        try {
            foreach ($data as $entry) {
                $experienceTableContent = ExperienceTableContent::find($entry['id']);
                if ($experienceTableContent) {
                    $experienceTableContent->update($entry);
                }
            }
            return true;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
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
