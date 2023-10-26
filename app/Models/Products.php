<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'images',
        'qty',
        'category_id',
        'oldPrice',
        'percent_discount',
        'salePrice',
        'description',
        'status',
        'seo_keyword',  
        'seo_description',
        'seo_title',
    ];
    public function parent(){
        return $this->belongsTo(Category::class);
     }
}
