<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Add extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'description'];
    const PAGES = [
        'home',
        'search_result',
        'show_clinic',
        'favourite_page',
        'mobile',
        'blog',
    ];
    protected $fillable = [
        'image',
        'link',
        'page',
        'date_from',
        'date_to',
    ];

    public $timestamps = false;

    public function getViews()
    {
        return DB::table('ads_view')->where('ads_id', $this->id)->count();
    }
}
