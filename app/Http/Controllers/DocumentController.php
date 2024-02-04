<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Repositories\DocumentRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    public function storeSampleContract(DocumentStoreRequest $request, DocumentRepository $dr): JsonResponse
    {
        $request->validated();
        $data = $request->file('document');

        $sampleContractUrl = $dr->storeSampleContract($data);

        return response()->json([
            'message' => 'Документ загружен',
            'url' => $sampleContractUrl,
        ]);
    }

    public function getSampleContract(DocumentRepository $dr)
    {
        try {
            $sampleContractPath = $dr->getSampleContract();

            return response()->download($sampleContractPath);
        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
