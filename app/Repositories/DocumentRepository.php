<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentRepository
{
    public function storeDocument($data, $type, $description = null): string
    {
        try {
            $typeKebab = $this->kebabToSnake($type);
            $originalName = $data->getClientOriginalName();
            $docName = md5(Carbon::now() . '_' . $originalName)
                . '.' . $data->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/documents', $data, $docName);

            if (in_array($type, Document::DOCUMENT_TYPES_PLURAL)) {
                $document = new Document();
                $document->type = $type;
            } else {
                $document = Document::query()
                    ->firstOrNew(['type' => $typeKebab,]);
            }

            if (!is_null($description)) {
                $document->description = $description;
            }

            $document->name = $originalName;
            $document->path = $path;
            $document->url = '/storage/' . $path;
            $document->uuid = Str::uuid();
            $document->save();

            return $document->url;
        } catch (\Exception $e) {
                Log::error('Error: ' . $e->getMessage());
                throw new \Exception('Ошибка загрузки документа');
        }
    }

    public function replaceDocument($data, $uuid): string
    {
        try {
            $originalName = $data->getClientOriginalName();
            $docName = md5(Carbon::now() . '_' . $originalName)
                . '.' . $data->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/documents', $data, $docName);

            $document = Document::query()
                ->firstOrNew(['uuid' => $uuid,]);

            $document->name = $originalName;
            $document->path = $path;
            $document->url = '/storage/' . $path;
            $document->save();

            return $document->url;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка загрузки документа');
        }
    }

    public function getDocument(string $type): ?string
    {
        try {
            $type = $this->kebabToSnake($type);
            $document = Document::where('type', $type)->first();

            return $document ? storage_path('app/public/' . $document->path) : null;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или не был загружен');
        }
    }

    public function getDocumentForDownload(string $uuid): ?string
    {
        try {
            $document = Document::where('uuid', $uuid)->first();
            return $document ? storage_path('app/public/' . $document->path) : null;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или не был загружен');
        }
    }

    public function removeDocumentByUuid(string $uuid): void
    {
        try {
            Document::where('uuid', $uuid)->delete();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или не был загружен');
        }
    }

    public function getDocumentsByType(string $type): ?Collection
    {
        try {
            $documents = Document::query()->where('type', $type)->get();
            if ($documents->isEmpty()) {
                return $documents;
            }

            return $documents;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Не удалось получить документы');
        }
    }

    public function getDocumentByUuid($uuid): ?Document
    {
        try {
            return Document::where('uuid', $uuid)->first();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или не был загружен');
        }
    }

    public function updateDocumentDesriptionByUuid($uuid, $desription): void
    {
        try {
            Document::where('uuid', $uuid)->update(['description' => $desription]);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Ошибка');
        }
    }

    private function kebabToSnake(string $text): string
    {
        return str_replace('-', '_', $text);
    }
}
