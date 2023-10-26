<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'logo',
        'name',
        'address',
        'time',
        'email',
        'hotline',
        'video',
        'network_fb',
        'network_ins',
        'network_tiktok',
        'network_shopee',
        'google_map',
        'seo_title',
        'seo_description',
        'seo_keyword',
    ];
}
