<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class BlogResource extends JsonResource
{

    public function toArray($request)
    {
        $this->addView();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'title_ar' => $this->title_ar,
            'description_ar' => $this->description_ar,
            'blog_category_id' => $this->blog_category_id,
            'subcategory_id' => $this->subcategory_id,
            'image' => url($this->image),
            'views' => $this->views ?? $this->getViews(),
            'category' => optional($this->category)->name,
            'meta_title_ar'=>$this->meta_title_ar,
            'meta_title'=>$this->meta_title,
            'meta_description_ar'=>$this->meta_description_ar,
            'meta_description'=>$this->meta_description,
            'meta_keywords_ar'=>$this->meta_keywords_ar,
            'meta_keywords'=>$this->meta_keywords,
            'url'=>$this->url,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }

    public function addView()
    {
        if (DB::table('blog_views')->where('blog_id', $this->id)->where('ip', request()->ip())->exists()) {
            return;
        }
        DB::table('blog_views')->insert([
            'blog_id' => $this->id,
            'ip' => request()->ip(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
