<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'phone',
        'image',
        'page_name',
        'type',
    ];
}
