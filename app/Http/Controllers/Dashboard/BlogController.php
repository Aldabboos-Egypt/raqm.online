<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-category')->only('index');
        $this->middleware('permission:create-category')->only('create');
        $this->middleware('permission:update-category')->only('edit');
        $this->middleware('permission:delete-category')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::pluck('name', 'id');
        return view('dashboard.blog.modal_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        if ($request->image) {
            $data['image'] = $this->uploadFile($request->image, 'uploads/blogs/');
        }
        Blog::create($data);
        toast(__('lang.done'), 'success');
        return redirect()->route('dashboard.blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::pluck('name', 'id');
        return view('dashboard.blog.modal_edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $data = $request->validated();
        $blog = Blog::findOrFail($id);
        if ($request->image) {
            if ($blog->image) {
                File::delete($blog->image);
            }
            $data['image'] = $this->uploadFile($request->image, 'uploads/blogs/');
        }
        $blog->update($data);
        toast(__('dashboard.done'), 'success');
        return redirect()->route('dashboard.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Blog::findOrFail($id);
        $category->delete();
        toast(__('dashboard.done'), 'success');
        return redirect()->route('dashboard.blogs.index');
    }
}
