<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
        $this->middleware('permission:read-role')->only('index');
        $this->middleware('permission:create-role')->only('create');
        $this->middleware('permission:update-role')->only('edit');
        $this->middleware('permission:delete-role')->only('destroy');
    }

    public function index()
    {
        $title = __('lang.delete_item');
        $text = __('lang.are_you_sure');
        confirmDelete($title, $text);

        return view('dashboard.roles.index', [
            'data' => $this->model->paginate(20),
        ]);
    }

    public function create()
    {
        return view('dashboard.roles.form', [
            'permissions' => Permission::all()->groupBy('path'),
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->validated();
        // dd($data);
        try {
            DB::beginTransaction();
            $resource = Role::create([
                'name'          =>  $inputs['name'],
                'display_name'  => $inputs['display_name'],
                'description'   => $inputs['description'],
            ]);
            $resource->syncPermissions($inputs['permissions']);
            DB::commit();

            toast(__('lang.done'), 'success', 'top-right');
            return redirect(route('dashboard.roles.index'));
        } catch (\Exception $th) {
            alert()->error('', $th->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        $resource = $this->model->findOrFail($id);
        return view('dashboard.roles.form', [
            'permissions' => Permission::all()->groupBy('path'),
            'resource' => $resource,
            'rolePermissions' => $resource->permissions->pluck('id')->all(),
        ]);
    }

    public function update(RoleRequest $request, $id)
    {
        $inputs = $request->validated();

        try {
            $resource = $this->model->findOrFail($id);
            $resource->update([
                'name'  => $inputs['name'],
                'display_name'  => $inputs['display_name'],
                'description'  => $inputs['description'],
            ]);
            $resource->syncPermissions($inputs['permissions']);
            toast(__('lang.done'), 'success', 'top-right');
            return redirect(route('dashboard.roles.index'));
        } catch (\Exception $th) {
            alert()->error('', $th->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        toast(__('lang.done'), 'success', 'top-right');
        return back();
    }
}
