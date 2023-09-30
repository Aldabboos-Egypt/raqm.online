<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read-admin')->only('index');
        $this->middleware('permission:create-admin')->only('create');
        $this->middleware('permission:update-admin')->only('edit');
        $this->middleware('permission:delete-admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $admin = new Admin();
        return view('dashboard.admins.form', compact('roles', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        unset($data['password']);

        $data['password'] = bcrypt($request->password);

        $admin = Admin::create($data);
        if($request->role)
            $admin->syncRoles([$request->role]);

        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.admins.form', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->validated();
        unset($data['password']);

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }else {
            $data['password'] = $admin->password;
        }

        $admin->update($data);
        if($request->role)
            $admin->syncRoles([$request->role]);

        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        toast(__('lang.done'),'success');
        return redirect()->route('dashboard.admins.index');
    }
}
