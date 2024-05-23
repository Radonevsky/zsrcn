<?php

namespace App\Repositories;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class AlbumRepository
{
    public function __construct(
        public GalleryRepository $galleryRepository,
    )
    {
    }

    private const COUNT_ALBUMS = 2;
    public function getAlbums(int $page)
    {
        $albums = Album::query()
            ->with(['images'])
            ->orderByDesc('created_at')
            ->skip($page * self::COUNT_ALBUMS)
            ->limit(self::COUNT_ALBUMS)
            ->get();

        $albums->each(function ($album) {
            $album->images = $album->images->splice(Album::TAKE_PHOTO_COUNT);
            $album->images->transform(function ($item) {
                $item->preview_url = asset($item->preview_url);
                $item->url = asset($item->url);

                return $item;
            });
            $album->partly = true;
        });

        return $albums;
    }

    public function getOtherImages(int $id, int $offset)
    {
        $images = Image::query()
            ->where('album_id', $id)
            ->limit(100)
            ->offset($offset)
            ->get()
            ->transform(function ($item) {
                $item->preview_url = asset($item->preview_url);
                $item->url = asset($item->url);

                return $item;
            });

        return $images;
    }

    public function storeAlbum($data)
    {
        DB::beginTransaction();

        $album = Album::query()->create([
            'name' => $data['name'],
        ]);

        if (count($data['photos']) > 0) {
            $this->galleryRepository->storePhotos($data['photos'], $album->id);
        }

        DB::commit();
    }

    public function removeAlbum($id)
    {
        Image::query()->where('album_id', $id)->delete();
        Album::query()->where('id', $id)->delete();
    }
}
