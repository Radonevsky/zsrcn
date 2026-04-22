<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialServicesPageContent extends Model
{
    use HasFactory;

    protected $table = 'social_services_page_content';

    protected $fillable = [
        'regulation_text',
        'round_clock_text',
        'center_info_items',
    ];

    protected $casts = [
        'center_info_items' => 'array',
    ];
}
