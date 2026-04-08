<?php

namespace App\Repositories;

use App\Models\AboutDescriptionContent;
use App\Models\AvailableContent;
use App\Models\ExperienceContent;
use App\Models\ExperienceTableContent;
use App\Models\StructureContent;
use App\Support\SanitizeHtml;
use Database\Seeders\AboutDescriptionSeeder;
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

    public function updateExperienceContent($data): array
    {
        try {
            $experienceContent = ExperienceContent::query()->first();
            if (array_key_exists('content', $data)) {
                $experienceContent->content = $data['content'];
            }
            if (array_key_exists('programs_content', $data)) {
                $experienceContent->programs_content = $data['programs_content'];
            }
            $experienceContent->save();

            return [
                'content' => $experienceContent->content,
                'programs_content' => $experienceContent->programs_content ?? '',
            ];
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    public function getAboutDescriptionContent(): AboutDescriptionContent
    {
        try {
            $row = AboutDescriptionContent::query()->first();
            if (! $row) {
                $row = AboutDescriptionContent::query()->create([
                    'html' => AboutDescriptionSeeder::defaultHtml(),
                ]);
            }

            return $row;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function updateAboutDescriptionContent($data): string
    {
        try {
            $content = AboutDescriptionContent::query()->firstOrFail();
            $content->html = SanitizeHtml::aboutDescription($data['html'] ?? '');
            $content->save();

            return $content->html;
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

    public function getStructureContent(): StructureContent
    {
        try {
            return StructureContent::query()->first();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function updateStructureContent($data): StructureContent
    {
        try {
            $content = StructureContent::query()->first();
            $content->update($data);
            $content->save();

            return $content;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }
}
