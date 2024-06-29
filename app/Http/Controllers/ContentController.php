<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvailableRequest;
use App\Repositories\ContentRepository;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    public function getAvailable(ContentRepository $cr): JsonResponse
    {
        try {
            $content = $cr->getAvailableContent();

            return response()->json([
                'error' => false,
                'content' => $content,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateAvailable(UpdateAvailableRequest $request, ContentRepository $cr)
    {
        try {
            $cr->updateAvailableContent($request->all());

            return response()->json([
                'error' => false,
                'message' => 'Успешно обновлено!',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
