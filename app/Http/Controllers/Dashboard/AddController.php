<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRequest;
use App\Models\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AddController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read-add')->only('index');
        $this->middleware('permission:create-add')->only('create');
        $this->middleware('permission:update-add')->only('edit');
        $this->middleware('permission:delete-add')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = Add::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.adds.index', compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Add::PAGES;
        return view('dashboard.adds.modal_create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $data = $request->validated();
        if($request->image){
            $data['image'] = $this->uploadFile($request->image, 'uploads/adds/');
        }
        Add::create($data);
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.adds.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $add = Add::findOrFail($id);
        $pages = Add::PAGES;
        $selectedPage = $add->page;
        return view('dashboard.adds.modal_edit', compact('add', 'pages', 'selectedPage'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddRequest $request, $id)
    {
        $data = $request->validated();
        $add = Add::findOrFail($id);
        if($request->image){
            if($add->image){
                File::delete($add->image);
            }
            $data['image'] = $this->uploadFile($request->image, 'uploads/adds/');
        }
        $add->update($data);
        toast(__('dashboard.done'),'success');
        return redirect()->route('dashboard.adds.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $add = Add::findOrFail($id);
        if($add->image){
            File::delete($add->image);
        }
        $add->delete();
        toast(__('dashboard.done'),'success');
        return redirect()->route('dashboard.adds.index');
    }
}
