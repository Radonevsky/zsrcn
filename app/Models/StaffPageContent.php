<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPageContent extends Model
{
    use HasFactory;

    protected $table = 'staff_page_content';

    protected $fillable = [
        'intro_text',
        'director_text',
        'roster',
    ];

    protected $casts = [
        'roster' => 'array',
    ];
}
