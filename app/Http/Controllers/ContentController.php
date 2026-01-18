<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvailableRequest;
use App\Repositories\ContentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function getExperience(ContentRepository $cr): JsonResponse
    {
        try {
            $content = $cr->getExperienceContent()->content;

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

    public function getExperienceTable(ContentRepository $cr): JsonResponse
    {
        try {
            $content = $cr->getExperienceTableContent();

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

    public function updateExperienceTable(Request $request, ContentRepository $cr): JsonResponse
    {
        try {
            $updated = $cr->updateExperienceTableContent($request->all());

            return response()->json([
                'error' => false,
                'updated' => $updated,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateExperience(Request $request, ContentRepository $cr): JsonResponse
    {
        try {
            $updated = $cr->updateExperienceContent($request->all());

            return response()->json([
                'error' => false,
                'updated' => $updated,
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

    public function getStructure(ContentRepository $cr): JsonResponse
    {
        try {
            $content = $cr->getStructureContent();

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

    public function updateStructure(Request $request, ContentRepository $cr): JsonResponse
    {
        try {
            $updated = $cr->updateStructureContent($request->all());

            return response()->json([
                'error' => false,
                'content' => $updated,
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
