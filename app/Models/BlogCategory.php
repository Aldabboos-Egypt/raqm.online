<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{

    protected $table = 'blog_categories';

    protected $fillable = ['name', 'description', 'name_ar', 'description_ar'];

}
