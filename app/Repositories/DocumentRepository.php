<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class DocumentRepository
{
    public function storeSampleContract($data): string
    {
        $docName = md5(Carbon::now() . '_' . $data->getClientOriginalName())
            . '.' . $data->getClientOriginalExtension();
        $path = Storage::disk('public')->putFileAs('/images', $data, $docName);

        $document = new Document();
        $document->path = $path;
        $document->url = url('/storage/' . $path);
        $document->save();

        return $document->url;
    }

}
