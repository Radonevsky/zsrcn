<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceContent extends Model
{
    use HasFactory;

    protected $table = 'experience_content';

    protected $fillable = [
        'content',
    ];
}
