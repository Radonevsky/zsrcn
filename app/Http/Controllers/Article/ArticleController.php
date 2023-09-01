<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function StoreArticle(ArticleStoreRequest $request)
    {
        $data = $request->validated();
        $image = $data['image'];
        unset($data['image']);
        $article = Article::query()->firstOrCreate($data);
    }
}
