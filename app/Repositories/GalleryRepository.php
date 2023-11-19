<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GalleryRepository
{
    private const COUNT_PHOTOS = 16;
    public function getPhotos($page)
    {
        $photos = Image::query()
            ->select(
                'id',
                'preview_url',
            )
            ->whereNull('article_id')
            ->orderByDesc('created_at')
            ->skip((int) $page * self::COUNT_PHOTOS)
            ->limit(self::COUNT_PHOTOS)
            ->get();

        return $photos;
    }

    public function storePhotos($data)
    {
        $createdImages = [];

        foreach ($data['photos'] as $image) {
            $imgName = md5(Carbon::now() . '_' . $image->getClientOriginalName())
                . '.' . $image->getClientOriginalExtension();
            $prevName = 'prev_' . $imgName;

            $path = Storage::disk('public')->putFileAs('/images', $image, $imgName);

            \Intervention\Image\Facades\Image::make($image)->fit(340, 360)
                ->save(storage_path('app/public/images/' . $prevName));

            $preview = url('/storage/images/' . $prevName);

            $createdImages[] = Image::query()->create([
                'path' => $path,
                'url' => url('/storage/' . $path),
                'preview_url' => $preview,
            ]);
        }

        return $createdImages;
    }

    public function removePhoto($id)
    {
        Image::query()->where('article_id', $id)->delete();
    }
}
