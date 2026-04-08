<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutDescriptionContent extends Model
{
    use HasFactory;

    protected $table = 'about_description_content';

    protected $fillable = [
        'html',
    ];
}
