<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoStoreRequest;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request, GalleryRepository $gr)
    {
        $photos = $gr->getPhotos();

        return response()->json([
            'photos' => $photos,
        ]);
    }

    public function store(PhotoStoreRequest $request, GalleryRepository $gr)
    {

        $data = $request->validated();

        $photos = $gr->storePhotos($data);

        return response()->json([
            'message' => 'Фотографии загружены',
            'article' => $photos,
        ]);
    }

    public function remove(Request $request, GalleryRepository $gr)
    {
        $gr->removePhoto($request->id);

        return response()->json([
            'message' => 'Фотография удалена',
        ]);
    }
}
