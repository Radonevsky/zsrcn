<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsContent extends Model
{
    use HasFactory;

    protected $table = 'contacts_content';

    protected $fillable = [
        'sort_order',
        'department',
        'work_time',
        'role_info',
        'phone',
        'email',
    ];
}
