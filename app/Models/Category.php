<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'status',
        'seo_keyword',
        'seo_description',
        'seo_title',
    ];
    public function childs(){
        return $this->hasMany(Category::class ,'category_id');
    }
}
