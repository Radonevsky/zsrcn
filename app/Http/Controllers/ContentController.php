<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvailableRequest;
use App\Http\Requests\UpdateContactsContentRequest;
use App\Http\Requests\UpdateBoardTrusteesPageRequest;
use App\Http\Requests\UpdateSocialServicesPageContentRequest;
use App\Http\Requests\UpdateStaffPageContentRequest;
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
            $row = $cr->getExperienceContent();

            return response()->json([
                'error' => false,
                'content' => $row->content,
                'programs_content' => $row->programs_content ?? '',
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

    public function getAboutDescription(ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->getAboutDescriptionContent();

            return response()->json([
                'error' => false,
                'html' => $row->html,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateAboutDescription(Request $request, ContentRepository $cr): JsonResponse
    {
        try {
            $html = $cr->updateAboutDescriptionContent($request->all());

            return response()->json([
                'error' => false,
                'html' => $html,
                'message' => 'Успешно обновлено!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getContactsContent(ContentRepository $cr): JsonResponse
    {
        try {
            $content = $cr->getContactsContent();

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

    public function updateContactsContent(UpdateContactsContentRequest $request, ContentRepository $cr): JsonResponse
    {
        try {
            $updated = $cr->updateContactsContent($request->validated());

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

    public function getStaffPage(ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->getStaffPageContent();

            return response()->json([
                'error' => false,
                'intro_text' => $row->intro_text,
                'director_text' => $row->director_text,
                'roster' => $row->roster ?? [],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateStaffPage(UpdateStaffPageContentRequest $request, ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->updateStaffPageContent($request->validated());

            return response()->json([
                'error' => false,
                'intro_text' => $row->intro_text,
                'director_text' => $row->director_text,
                'roster' => $row->roster ?? [],
                'message' => 'Успешно обновлено!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getBoardTrusteesPage(ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->getBoardTrusteesPageContent();

            return response()->json([
                'error' => false,
                'html' => $row->html,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateBoardTrusteesPage(UpdateBoardTrusteesPageRequest $request, ContentRepository $cr): JsonResponse
    {
        try {
            $html = $cr->updateBoardTrusteesPageContent($request->validated());

            return response()->json([
                'error' => false,
                'html' => $html,
                'message' => 'Успешно обновлено!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getSocialServicesPage(ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->getSocialServicesPageContent();

            return response()->json([
                'error' => false,
                'regulation_text' => $row->regulation_text,
                'round_clock_text' => $row->round_clock_text,
                'center_info_items' => $row->center_info_items ?? [],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function updateSocialServicesPage(UpdateSocialServicesPageContentRequest $request, ContentRepository $cr): JsonResponse
    {
        try {
            $row = $cr->updateSocialServicesPageContent($request->validated());

            return response()->json([
                'error' => false,
                'regulation_text' => $row->regulation_text,
                'round_clock_text' => $row->round_clock_text,
                'center_info_items' => $row->center_info_items ?? [],
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
