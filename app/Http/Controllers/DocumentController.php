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

            $sampleContractUrl = $dr->storeDocument($data, $request->type);

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
            $sampleContractPath = $dr->getDocument($request->type);

            return response()->download($sampleContractPath);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Ошибка загрузки документа',
            ], 404);
        }
    }
}
