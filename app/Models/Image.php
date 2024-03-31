<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @see CreateRequestsTable
 *
 * @property int $id
 * @property int $article_id
 * @property int $album_id
 * @property string $path
 * @property string $preview_url
 * @property string $url
 * @property string $name
 *
 * @property-read Model<Album> $album
 *
 * @mixin Builder
 */

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'path',
        'url',
        'preview_url',
        'album_id',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
