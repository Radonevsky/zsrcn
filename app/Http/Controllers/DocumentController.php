<?php

namespace App\Http\Controllers;

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
}
