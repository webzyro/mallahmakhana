<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'title',
        'slug',
        'description',
        'image',
        'is_active',
        'author',
        'category',
    ];
}
