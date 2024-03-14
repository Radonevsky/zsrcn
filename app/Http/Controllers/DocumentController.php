<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentReplaceRequest;
use App\Http\Requests\DocumentStoreRequest;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{
    public function store(DocumentStoreRequest $request, DocumentRepository $dr): JsonResponse
    {
        try {
            $request->validated();
            $data = $request->file('document');
            $description = $request->input('description');
            $sampleContractUrl = $dr->storeDocument($data, $request->type, $description);

            return response()->json([
                'message' => 'Документ загружен',
                'url' => $sampleContractUrl,
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Ошибка загрузки документа',
            ], 400);
        }
    }

    public function index(Request $request, DocumentRepository $dr)
    {
        try {
            $document = $dr->getDocument($request->type);

            if (is_null($document)) {
                return response()->json([
                    'error' => true,
                    'message' => 'Документ не найден',
                ], 404);
            }

            return response()->download($document);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getDocuments(Request $request, DocumentRepository $dr)
    {
        try {
            $documents = $dr->getDocumentsByType($request->type);

            return response()->json([
                'error' => false,
                'documents' => $documents,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function getDocumentByUuid(Request $request, DocumentRepository $dr)
    {
        try {
            $document = $dr->getDocumentByUuid($request->uuid);

            if (is_null($document)) {
                return response()->json([
                    'error' => true,
                    'message' => 'Документ не найден',
                ], 404);
            }

            return response()->json([
                'error' => false,
                'document' => $document,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function replaceDocumentByUuid(DocumentReplaceRequest $request, DocumentRepository $dr)
    {
        try {
            $request->validated();
            $data = $request->file('document');
            $description = $request->input('description');
            $sampleContractUrl = $dr->replaceDocument($data, $request->uuid, $description);

            return response()->json([
                'message' => 'Документ загружен',
                'url' => $sampleContractUrl,
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Ошибка загрузки документа',
            ], 400);
        }
    }

    public function getDocumentDownloadByUuid(Request $request, DocumentRepository $dr)
    {
        try {
            $document = $dr->getDocumentForDownload($request->uuid);

            if (is_null($document)) {
                return response()->json([
                    'error' => true,
                    'message' => 'Документ не найден',
                ], 404);
            }

            return response()->download($document);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function removeDocumentByUuid(Request $request, DocumentRepository $dr)
    {
        try {
            $dr->removeDocumentByUuid($request->uuid);

            return response()->json([
                'error' => false,
                'message' => 'Документ удален'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function updateDocumentDescription(Request $request, DocumentRepository $dr)
    {
        try {
            $dr->updateDocumentDesriptionByUuid($request->uuid, $request->description);

            return response()->json([
                'error' => false,
                'message' => 'Описание сохранено'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
