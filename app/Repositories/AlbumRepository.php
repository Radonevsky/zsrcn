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
    public function getAlbums(int $page, bool $partly)
    {
        $albums = Album::query()
            ->withCount('images')
            ->with(['images' => function ($query) use ($partly) {
                if ($partly) {
                    $query->take(Album::TAKE_PHOTO_COUNT + self::COUNT_ALBUMS);
                }
            }])
            ->orderByDesc('created_at')
            ->skip($page * self::COUNT_ALBUMS)
            ->limit(self::COUNT_ALBUMS)
            ->get();

        $albums->each(function ($album) use ($partly) {
            $album->partly = $partly && $album->images_count > $album->images->count();
        });

        return $albums;
    }

    public function getOtherImages(int $id)
    {
        $images = Image::query()
            ->where('album_id', $id)
            ->limit(100)
            ->offset(Album::TAKE_PHOTO_COUNT)
            ->get();

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
        Image::query()->where('article_id', $id)->delete();
    }
}
