<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    public function StoreArticle(ArticleStoreRequest $request, ArticleRepository $ar)
    {
        $data = $request->validated();

        $article = $ar->storeArticle($data);

        return response()->json([
            'message' => 'Новость добавлена',
            'article' => $article,
        ]);
    }
}
