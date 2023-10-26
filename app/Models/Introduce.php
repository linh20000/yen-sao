<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    use HasFactory;
    protected $table = 'introduces';
    protected $fillable = [
        'name',
        'thumbnail',
        'seo_title',
        'description',
    ];
}
