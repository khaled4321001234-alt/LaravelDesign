<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    
    use HasFactory,SoftDeletes;

    protected $table = 'slider';
    protected $fillable = [
    'title_en',
    'title_ar',
    'description_en',
    'description_ar',
    'img',
    'product_id',
    'slug_ar',
    'slug_en',
];

}
