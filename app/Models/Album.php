<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @see CreateRequestsTable
 *
 * @property int $id
 * @property string $name
 *
 * @property-read Collection<Image> $images
 *
 * @mixin Builder
 */
class Album extends Model
{
    use HasFactory;

    const TAKE_PHOTO_COUNT = 8;

    protected $fillable = [
        'name',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'album_id');
    }
}
