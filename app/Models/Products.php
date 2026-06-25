<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'excerpt_ar',
        'excerpt_en',
        'description_ar',
        'description_en',
        'slug_ar',
        'slug_en',
        'image',
        'type',
        'link',
    ];

    /**
     * الصور الإضافية للخبر/المنتج
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('sort_order');
    }
}
