<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MenuItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title_en','title_ar', 'link', 'parent_id','slug_ar','slug_en','rank'];


    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->select(
                'id',
                'parent_id',
                'rank',
                'link',
                DB::raw(columnLocalize("title", table: "menu_items") . " as title")
            )
            ->orderBy('rank');
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

}
