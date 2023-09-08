<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, ArticleRepository $ar)
    {
        $articles = $ar->getArticleList();

        return response()->json([
            'articles' => $articles,
        ]);
    }

    public function store(ArticleStoreRequest $request, ArticleRepository $ar)
    {
        $data = $request->validated();

        $article = $ar->storeArticle($data);

        return response()->json([
            'message' => 'Новость добавлена',
            'article' => $article,
        ]);
    }

    public function update(ArticleUpdateRequest $request, ArticleRepository $ar)
    {
        $data = $request->validated();

        $ar->updateArticle($data);

        return response()->json([
            'message' => 'Новость обновлена',
        ]);
    }

    public function remove(Request $request, ArticleRepository $ar)
    {
        $ar->removeArticle($request->id);

        return response()->json([
            'message' => 'Новость удалена',
        ]);
    }
}
