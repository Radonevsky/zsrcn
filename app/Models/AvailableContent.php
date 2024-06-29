<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableContent extends Model
{
    use HasFactory;

    protected $table = 'available_content';

    protected $fillable = [
        'update_date',
        'count',
        'free_count',
    ];
}
