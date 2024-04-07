<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumStoreRequest;
use App\Http\Requests\StorePhotoToAlbumRequest;
use App\Repositories\AlbumRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Request $request, AlbumRepository $ar)
    {
        $albums = $ar->getAlbums($request->page, $request->partly);

        return response()->json([
            'albums' => $albums,
        ]);
    }

    public function store(AlbumStoreRequest $request, AlbumRepository $ar)
    {

        $data = $request->validated();

        $ar->storeAlbum($data);

        return response()->json([
            'message' => 'Альбом создан',
        ]);
    }

    public function storePhotosToAlbum(StorePhotoToAlbumRequest $request, GalleryRepository $ar)
    {
        $data = $request->validated();

        $ar->storePhotos($data['photos'], $request->albumId);

        return response()->json([
            'message' => 'Фото добавлены',
        ]);
    }

    public function remove(Request $request, AlbumRepository $ar)
    {
        $ar->removeAlbum($request->id);

        return response()->json([
            'message' => 'Альбом удален успешно',
        ]);
    }

    public function getOtherPhotos(Request $request, AlbumRepository $ar)
    {
        $otherPhotos = $ar->getOtherImages($request->id, $request->offset);

        return response()->json([
            'error' => false,
            'images' => $otherPhotos,
        ]);
    }
}
