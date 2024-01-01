<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'description',
        'blog_category_id',
        'image',
        'title_ar',
        'description_ar',
    ];

    protected $appends = [
        'subcategory_id',
    ];

    public function getBlogSubCategory()
    {
        $resource = DB::table('blogs_sub_categories')->where('blog_id', $this->id)->first();
        return $resource;
    }

    public function getSubcategoryIdAttribute()
    {
        return optional($this->getBlogSubCategory())->sub_category_id;
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getViews()
    {
        return DB::table('blog_views')->where('blog_id', $this->id)->count();
    }
}
