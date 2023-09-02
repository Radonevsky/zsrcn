<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleRepository
{
    public function getArticleList()
    {
        $articles = Article::query()
            ->join('images as i', 'i.article_id', 'articles.id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.content',
                'i.url as img_url',
                'articles.id',
                'articles.id',
            )
            ->get();
        return $articles;
    }

    public function storeArticle($data)
    {
        $image = $data['image'];
        unset($data['image']);
        $imgName = md5(Carbon::now() . '_' . $image->getClientOriginalName())
            . '.' . $image->getClientOriginalExtension();

        $article = null;
        $img = null;

        DB::transaction(function () use (&$img, &$article, $data, $image, $imgName) {
            $article = Article::query()->firstOrCreate($data);

            $path = Storage::disk('public')->putFileAs('/images', $image, $imgName);

            $img = Image::query()->create([
                'path' => $path,
                'url' => url('/storage/' . $path),
                'article_id' => $article->id,
            ]);
        });
        $article->img_url = $img->url;
        return $article;
    }
}
