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
            $type = $this->kebabToSnake($type);
            $docName = md5(Carbon::now() . '_' . $data->getClientOriginalName())
                . '.' . $data->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/documents', $data, $docName);

            if (in_array($type, Document::DOCUMENT_TYPES_PLURAL)) {
                $document = new Document();
                $document->type = $type;
            } else {
                $document = Document::query()
                    ->firstOrNew(['type' => $type,]);
            }

            if (!is_null($description)) {
                $document->description = $description;
            }

            $document->path = $path;
            $document->url = url('/storage/' . $path);
            $document->uuid = Str::uuid();
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

    public function getDocumentsByType(string $type): ?Collection
    {
        try {
            $documents = Document::query()->where('type', $type)->get();
            if ($documents->isEmpty()) {
                return $documents;
            }
            $documents = $documents->transform(function ($doc) {
                $doc->storage_path = storage_path('app/public/' . $doc->path);

                return $doc;
            });

            return $documents;
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или не был загружен');
        }
    }

    private function kebabToSnake(string $text): string
    {
        return str_replace('-', '_', $text);
    }
}
