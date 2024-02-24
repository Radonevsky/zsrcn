<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentRepository
{
    public function storeDocument($data, $type): string
    {
        try {
            $type = $this->kebabToSnake($type);
            $docName = md5(Carbon::now() . '_' . $data->getClientOriginalName())
                . '.' . $data->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('/documents', $data, $docName);

            $document = Document::query()
                ->firstOrNew([
                    'type' => $type,
                ]);
            $document->path = $path;
            $document->url = url('/storage/' . $path);
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

    private function kebabToSnake(string $text): string
    {
        return str_replace('-', '_', $text);
    }
}
