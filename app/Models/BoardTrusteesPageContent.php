<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardTrusteesPageContent extends Model
{
    use HasFactory;

    protected $table = 'board_trustees_page_content';

    protected $fillable = [
        'html',
    ];
}
