<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Clinic;
use App\Models\Subcategory;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read-subcategory')->only('index');
        $this->middleware('permission:create-subcategory')->only('create');
        $this->middleware('permission:update-subcategory')->only('edit');
        $this->middleware('permission:delete-subcategory')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('dashboard.subcategories.modal_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $data = $request->validated();
        Subcategory::create($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.subcategories.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('dashboard.subcategories.modal_edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $data = $request->validated();
        $subcategory->update($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.subcategories.index', compact('subcategory'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.subcategories.index');
    }
}
