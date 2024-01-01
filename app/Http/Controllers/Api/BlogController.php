<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogsResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function blogCategories(Request $request)
    {
        return DB::table('blog_categories')->take(60)->get();
    }

    public function blogs(Request $request)
    {
        $resources = Blog::where(function ($q) use ($request) {
            if ($request->search) {
                $q
                    ->where('title', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('description', 'like', '%' . $request->input('search') . '%')
                ;
            }
        })
            ->where(function ($q) use ($request) {
                if ($request->category_id) {
                    $q->where('blog_category_id', $request->category_id);
                }

            })
            ->select(
                '*',
                DB::raw("(select count(ip) from blog_views where blog_views.blog_id = blogs.id) as views")
            )
            ->paginate(10);
        // dd($resources);

        return response(new BlogsResource($resources));
    }

    public function addBlogView($id, Request $request)
    {
        if (!DB::table('blog_views')->where('ads_id', $id)->where('ip', request()->ip())->exists()) {
            DB::table('blog_views')->insert([
                'blog_id' => $id,
                'ip' => request()->ip(),
            ]);
        }

        return responseJson(true, 'success');
    }

    public function getBlog($slug)
    {
        $blog = Blog::where(DB::raw('REPLACE(LOWER(blogs.title), " ", "-")'), "like", '%' . $slug . '%')->first();
        return new BlogResource(Blog::find($blog));
    }

}
