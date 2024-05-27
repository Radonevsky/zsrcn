<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleRepository
{
    private const COUNT_ARTICLES = 3;
    public function getArticleList($page)
    {
        $articles = Article::query()
            ->join('images as i', 'i.article_id', 'articles.id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.content',
                'i.url as img_url',
                'i.preview_url as img_prev_url',
                'articles.id',
                'articles.created_at',
            )
            ->skip($page * self::COUNT_ARTICLES)
            ->limit(self::COUNT_ARTICLES)
            ->orderByDesc('articles.created_at')
            ->get();

        $articles->transform(function ($item) {
            $item->img_prev_url = asset($item->img_prev_url);
            $item->img_url = asset($item->img_url);
            $item->created_date = Carbon::parse($item->created_at)->format('d.m.Y');

            return $item;
        });

        return $articles;
    }

    public function storeArticle($data)
    {
        $image = $data['image'];
        unset($data['image']);
        $imgName = md5(Carbon::now() . '_' . $image->getClientOriginalName())
            . '.' . $image->getClientOriginalExtension();
        $prevName = 'prev_' . $imgName;

        $article = null;
        $img = null;

        DB::transaction(function () use (&$img, &$article, $data, $image, $imgName, $prevName) {
            $article = Article::query()->firstOrCreate($data);

            $path = Storage::disk('public')->putFileAs('/images', $image, $imgName);

            \Intervention\Image\Facades\Image::make($image)->orientate()->fit(340, 360)
                ->save(storage_path('app/public/images/' . $prevName));

            $img = Image::query()->create([
                'path' => $path,
                'url' => url('/storage/' . $path),
                'preview_url' => '/storage/images/' . $prevName,
                'article_id' => $article->id,
            ]);

        });
        $article->img_url = $img->url;
        return $article;
    }

    public function updateArticle($id, $data)
    {
        $article = null;

        DB::transaction(function () use (&$article, $id, $data) {
            $article = Article::query()
                ->where('id', $id)
                ->update($data);
        });

        return $article;
    }

    public function removeArticle($id)
    {
        DB::transaction(function() use ($id) {
            Image::query()->where('article_id', $id)->delete();
            Article::query()->find($id)->delete();
        });
    }
}
