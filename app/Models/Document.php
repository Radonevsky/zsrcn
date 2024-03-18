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
 * @property string $name
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
        'statements2023',
        'statements2022',
        'statements2021',
        'statements2020',
        'statements2019',
        'statements2018',
        'statements2017',
        'plannings2023',
        'plannings2022',
        'plannings2021',
        'plannings2020',
        'plannings2019',
        'plannings2018',
        'plannings2017',
    ];

    protected $fillable = [
        'path',
        'url',
        'type',
        'name,'
    ];
}
