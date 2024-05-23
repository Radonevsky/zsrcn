<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Carbon;
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
                'url',
            )
            ->whereNull('article_id')
            ->orderByDesc('created_at')
            ->skip((int) $page * self::COUNT_PHOTOS)
            ->limit(self::COUNT_PHOTOS)
            ->get()
            ->transform(function ($item) {
                $item->preview_url = asset($item->preview_url);
                $item->url = asset($item->url);
            });

        return $photos;
    }

    public function storePhotos(array $photos, int $albumId = null)
    {
        $createdImages = [];
        foreach ($photos as $image) {
            $imgName = md5(Carbon::now() . '_' . $image->getClientOriginalName())
                . '.' . $image->getClientOriginalExtension();
            $prevName = 'prev_' . $imgName;

            $image = \Intervention\Image\Facades\Image::make($image);
            $image->orientate();
            $image->resize(1024, 1024, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save(storage_path('app/public/images/' . $imgName));

            Storage::disk('public')->put('images/' . $imgName, file_get_contents(storage_path('app/public/images/' . $imgName)));

            $image->fit(340, 360)->save(storage_path('app/public/images/' . $prevName), 75);
            Storage::disk('public')->put('images/' . $prevName, file_get_contents(storage_path('app/public/images/' . $prevName)));

            $preview = '/storage/images/' . $prevName;

            $createdImages[] = Image::query()->create([
                'path' => 'images/' . $imgName,
                'url' => asset('/storage/images/' . $imgName),
                'preview_url' => asset($preview),
                'album_id' => $albumId,
            ]);
        }

        return $createdImages;
    }

    public function removePhoto($id)
    {
        Image::query()->where('id', $id)->delete();
    }
}
