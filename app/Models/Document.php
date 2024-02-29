<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $uuid
 * @property int $article_id
 * @property string $path
 * @property string $url
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @mixin Builder
 */

class Document extends Authenticatable
{
    protected $fillable = [
        'path',
        'url',
        'type',
    ];
}
