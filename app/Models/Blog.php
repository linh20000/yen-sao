<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $fillable = [
        'id',
        'name',
        'image',
        'subname',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
    ];
}
