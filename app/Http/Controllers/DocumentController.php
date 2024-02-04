<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Repositories\DocumentRepository;

class DocumentController extends Controller
{
    public function storeSampleContract(DocumentStoreRequest $request, DocumentRepository $dr)
    {
        $data = $request->file('document');

        $sampleContractUrl = $dr->storeSampleContract($data);

        return response()->json([
            'message' => 'Документ загружен',
            'url' => $sampleContractUrl,
        ]);
    }
}
