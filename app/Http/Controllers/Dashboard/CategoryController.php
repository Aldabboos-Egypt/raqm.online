<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct() {
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
        $categories = Category::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.modal_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('dashboard.categories.modal_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = category::findOrFail($id);
        $category->update($data);
        toast(__('dashboard.done'),'success');
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        toast(__('dashboard.done'),'success');
        return redirect()->route('dashboard.categories.index');
    }
}
