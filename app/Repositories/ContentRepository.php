<?php

namespace App\Repositories;

use App\Models\AboutDescriptionContent;
use App\Models\BoardTrusteesPageContent;
use App\Models\AvailableContent;
use App\Models\ContactsContent;
use App\Models\ExperienceContent;
use App\Models\ExperienceTableContent;
use App\Models\SocialServicesPageContent;
use App\Models\StaffPageContent;
use App\Models\StructureContent;
use App\Support\SanitizeHtml;
use Database\Seeders\AboutDescriptionSeeder;
use Database\Seeders\BoardTrusteesPageContentSeeder;
use Database\Seeders\SocialServicesPageContentSeeder;
use Database\Seeders\StaffPageContentSeeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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
            $content->day_care_count = $data['day_care_count'] ?? '';
            $content->day_care_free_count = $data['day_care_free_count'] ?? '';

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

    public function getContactsContent(): Collection
    {
        try {
            return ContactsContent::query()
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    /**
     * @param  array<int, array<string, mixed>>  $rows
     */
    public function updateContactsContent(array $rows): Collection
    {
        try {
            DB::transaction(function () use ($rows) {
                ContactsContent::query()->delete();
                foreach ($rows as $index => $row) {
                    $email = trim((string) ($row['email'] ?? ''));
                    if ($email === '') {
                        $email = 'gusonat@mail.ru';
                    }
                    ContactsContent::query()->create([
                        'sort_order' => (int) ($row['sort_order'] ?? $index),
                        'department' => $row['department'] ?? '',
                        'work_time' => $row['work_time'] ?? '',
                        'role_info' => $row['role_info'] ?? '',
                        'phone' => $row['phone'] ?? '',
                        'email' => $email,
                    ]);
                }
            });

            return $this->getContactsContent();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    public function getStaffPageContent(): StaffPageContent
    {
        try {
            if (! StaffPageContent::query()->exists()) {
                (new StaffPageContentSeeder)->run();
            }

            return StaffPageContent::query()->firstOrFail();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    /**
     * @param  array{intro_text?: string, director_text?: string, roster?: array<int, array<string, mixed>>}  $data
     */
    public function updateStaffPageContent(array $data): StaffPageContent
    {
        try {
            $row = StaffPageContent::query()->firstOrFail();
            $roster = $data['roster'] ?? [];
            if (! is_array($roster)) {
                $roster = [];
            }
            $row->intro_text = (string) ($data['intro_text'] ?? '');
            $row->director_text = (string) ($data['director_text'] ?? '');
            $row->roster = array_values($this->sanitizeStaffRoster($roster));
            $row->save();

            return $row;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    /**
     * @param  array<int, array<string, mixed>>  $roster
     * @return array<int, array<string, string>>
     */
    private function sanitizeStaffRoster(array $roster): array
    {
        $out = [];
        foreach ($roster as $item) {
            if (! is_array($item)) {
                continue;
            }
            $kind = $item['kind'] ?? '';
            if ($kind === 'section') {
                $out[] = [
                    'kind' => 'section',
                    'title' => mb_substr((string) ($item['title'] ?? ''), 0, 500),
                ];
            } elseif ($kind === 'person') {
                $out[] = [
                    'kind' => 'person',
                    'name' => mb_substr((string) ($item['name'] ?? ''), 0, 500),
                    'position' => mb_substr((string) ($item['position'] ?? ''), 0, 2000),
                ];
            }
        }

        return $out;
    }

    public function getBoardTrusteesPageContent(): BoardTrusteesPageContent
    {
        try {
            if (! BoardTrusteesPageContent::query()->exists()) {
                (new BoardTrusteesPageContentSeeder)->run();
            }

            return BoardTrusteesPageContent::query()->firstOrFail();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    public function updateBoardTrusteesPageContent(array $data): string
    {
        try {
            $content = BoardTrusteesPageContent::query()->firstOrFail();
            $content->html = SanitizeHtml::aboutDescription($data['html'] ?? '');
            $content->save();

            return $content->html;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    public function getSocialServicesPageContent(): SocialServicesPageContent
    {
        try {
            if (! SocialServicesPageContent::query()->exists()) {
                (new SocialServicesPageContentSeeder)->run();
            }

            $row = SocialServicesPageContent::query()->firstOrFail();
            $changed = false;
            if ($row->round_clock_text === null) {
                $row->round_clock_text = SocialServicesPageContentSeeder::defaultRoundClockText();
                $changed = true;
            }
            if ($row->center_info_items === null) {
                $row->center_info_items = SocialServicesPageContentSeeder::defaultCenterInfoItems();
                $changed = true;
            }
            if ($changed) {
                $row->save();
            }

            return $row;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки данных');
        }
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function updateSocialServicesPageContent(array $data): SocialServicesPageContent
    {
        try {
            $row = SocialServicesPageContent::query()->firstOrFail();
            if (array_key_exists('regulation_text', $data)) {
                $row->regulation_text = (string) $data['regulation_text'];
            }
            if (array_key_exists('round_clock_text', $data)) {
                $row->round_clock_text = (string) $data['round_clock_text'];
            }
            if (array_key_exists('center_info_items', $data)) {
                $row->center_info_items = $this->sanitizeCenterInfoItems(
                    is_array($data['center_info_items'] ?? null) ? $data['center_info_items'] : []
                );
            }
            $row->save();

            return $row;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка обновления данных');
        }
    }

    /**
     * @param  list<mixed>  $rows
     * @return list<array<string, int|string>>
     */
    private function sanitizeCenterInfoItems(array $rows): array
    {
        $out = [];
        foreach ($rows as $item) {
            if (! is_array($item)) {
                continue;
            }
            $id = $item['id'] ?? '';
            if (is_string($id)) {
                $id = mb_substr($id, 0, 100);
            } elseif (is_numeric($id)) {
                $id = (int) $id;
            } else {
                $id = '';
            }
            $out[] = [
                'id' => $id,
                'title' => mb_substr((string) ($item['title'] ?? ''), 0, 20000),
                'content' => mb_substr((string) ($item['content'] ?? ''), 0, 20000),
            ];
        }

        return $out;
    }
}
