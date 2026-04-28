<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenAppealsPageContent extends Model
{
    use HasFactory;

    protected $table = 'citizen_appeals_page_content';

    protected $fillable = [
        'schedule_rows',
        'legal_basis_items',
    ];

    protected $casts = [
        'schedule_rows' => 'array',
        'legal_basis_items' => 'array',
    ];
}
