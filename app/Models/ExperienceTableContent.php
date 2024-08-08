<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceTableContent extends Model
{
    use HasFactory;

    protected $table = 'experience_table_content';

    protected $fillable = [
        'year',
        'returned_to_family',
        'family_welfare',
        'sent_to_educational_institutions',
        'other_forms',
    ];
}
