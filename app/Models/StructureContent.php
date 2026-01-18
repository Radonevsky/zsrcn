<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureContent extends Model
{
    use HasFactory;

    protected $table = 'structure_content';

    protected $fillable = [
        'description',
        'org_chart_data',
        'additional_data',
    ];

    protected $casts = [
        'org_chart_data' => 'array',
        'additional_data' => 'array',
    ];
}
