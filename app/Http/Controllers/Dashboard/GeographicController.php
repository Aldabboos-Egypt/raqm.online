<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeographicRequest;
use App\Models\GeographicData;

class GeographicController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read-city')->only('index');
        $this->middleware('permission:create-city')->only('create');
        $this->middleware('permission:update-city')->only('edit');
        $this->middleware('permission:delete-city')->only('destroy');
    }

     /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geographics = GeographicData::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.geographics.index', compact('geographics'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.geographics.modal_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeographicRequest $request)
    {
        $data = $request->validated();
        GeographicData::create($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.geographics.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $geographic = GeographicData::findOrFail($id);
        return view('dashboard.geographics.modal_edit', compact('geographic'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeographicRequest $request, $id)
    {
        $data = $request->validated();
        $geographic = GeographicData::findOrFail($id);
        $geographic->update($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.geographics.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = GeographicData::findOrFail($id);
        $category->delete();
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.geographics.index');
    }
}
