<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumStoreRequest;
use App\Repositories\AlbumRepository;
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

    public function remove(Request $request, AlbumRepository $ar)
    {
        $ar->removeAlbum($request->id);

        return response()->json([
            'message' => 'Фотография удалена',
        ]);
    }

    public function getOtherPhotos(Request $request, AlbumRepository $ar)
    {
        $otherPhotos = $ar->getOtherImages($request->id);

        return response()->json([
            'error' => false,
            'images' => $otherPhotos,
        ]);
    }
}
