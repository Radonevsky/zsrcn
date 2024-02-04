<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Document extends Authenticatable
{
    protected $fillable = [
        'path',
        'url',
    ];
}
