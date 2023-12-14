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

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getViews()
    {
        return DB::table('blog_views')->where('blog_id', $this->id)->count();
    }
}
