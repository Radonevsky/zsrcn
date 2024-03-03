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
    const DOCUMENT_TYPES_PLURAL = [
        'reports',
    ];

    protected $fillable = [
        'path',
        'url',
        'type',
    ];
}
