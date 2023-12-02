<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
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
        $blog_category = BlogCategory::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.blog_category.index', compact('blog_category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog_category.modal_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        $data = $request->validated();
        BlogCategory::create($data);
        toast(__('lang.done'), 'success');
        return redirect()->route('dashboard.blog_category.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('dashboard.blog_category.modal_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = BlogCategory::findOrFail($id);
        $category->update($data);
        toast(__('dashboard.done'), 'success');
        return redirect()->route('dashboard.blog_category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        toast(__('dashboard.done'), 'success');
        return redirect()->route('dashboard.blog_category.index');
    }
}
