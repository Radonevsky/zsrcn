<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentRepository
{
    public function storeSampleContract($data): string
    {
        $docName = md5(Carbon::now() . '_' . $data->getClientOriginalName())
            . '.' . $data->getClientOriginalExtension();
        $path = Storage::disk('public')->putFileAs('/documents', $data, $docName);

        $document = Document::query()
            ->firstOrNew([
                'type' => Document::TYPE_SAMPLE_CONTRACT
            ]);
        $document->path = $path;
        $document->url = url('/storage/' . $path);
        $document->save();

        return $document->url;
    }

    public function getSampleContract(): string
    {
        try {
            $document = Document::where('type', Document::TYPE_SAMPLE_CONTRACT)->first();

            return storage_path('app/public/' . $document->path);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw new \Exception('Документ не найден или небыл загружен');
        }
    }
}
