<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ClinicsDatatable;
use App\Exports\ClinicsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;
use App\Http\Requests\QuickUpdateRequest;
use App\Imports\ClinicsImport;
use App\Models\Clinic;
use App\Models\GeographicData;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-clinic')->only('index');
        $this->middleware('permission:create-clinic')->only('create');
        $this->middleware('permission:update-clinic')->only('edit');
        $this->middleware('permission:delete-clinic')->only('destroy');
    }

    public function index(ClinicsDatatable $dataTable)
    {
        $subCategories = Subcategory::pluck('name', 'id')->toArray();
        return $dataTable->render('dashboard.clinics.index', ['subCategories' => $subCategories]);
    }

    public function create()
    {
        $clinic = new Clinic();
        $subCategories = Subcategory::pluck('name', 'id');
        $cities = GeographicData::pluck('city', 'city_id');
        return view('dashboard.clinics.form', compact('clinic', 'subCategories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        $clinic = Clinic::create($data);
        DB::table('clinic_subcategories')->insert([
            'clinic_id' => $clinic->clinic_id,
            'subcategory_id' => $data['subcategory_id'],
        ]);
        DB::commit();
        toast(__('lang.done'), 'success');
        return redirect()->route('dashboard.clinics.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        $subCategories = Subcategory::pluck('name', 'id');
        $cities = GeographicData::pluck('city', 'city_id');
        return view('dashboard.clinics.form', compact('clinic', 'subCategories', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request, $id)
    {
        $clinic = Clinic::findOrFail($id);
        $data = $request->validated();
        DB::table('clinic_subcategories')->updateOrInsert([
            'subcategory_id' => $data['subcategory_id'],
        ]);
        $clinic->update($data);
        toast(__('lang.done'), 'success');
        return redirect()->route('dashboard.clinics.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        DB::table('clinic_subcategories')->where('clinic_id', $clinic->clinic_id)->delete();
        $clinic->delete();
        toast(__('lang.done'), 'success');
        return redirect()->route('dashboard.clinics.index');
    }

    public function quickEdit(Request $request)
    {
        if ($request->ids == null) {
            $clinics = Clinic::paginate(50);
        } else {
            $ids = explode(',', $request->ids);
            $clinics = Clinic::whereIn('clinic_id', $ids)->paginate(50);
        }

        return view('dashboard.clinics.quick_edit', [
            'clinics' => $clinics,
            'subcategories' => Subcategory::pluck('name', 'id'),
        ]);
    }

    /**
     * Quick update clinics
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function quickUpdate(QuickUpdateRequest $request)
    {
        $request->validated();

        foreach ($request->clinics as $key => $value) {
            $item = Clinic::find($key);
            $item->title = $value['title'];
            $item->description = $value['description'];
            $item->phone = $value['phone'];
            $item->price = $value['price'];
            $item->latitude = $value['latitude'];
            $item->longitude = $value['longitude'];

            DB::table('clinic_subcategories')->where('clinic_id', $key)->update([
                'subcategory_id' => $value['subcategory_id'],
            ]);

            $item->save();
        }
        toast(__('lang.done'), 'success', 'top-right');
        return redirect()->route('dashboard.clinics.index');
    }

    public function isTrust(Request $request)
    {
        $clinic = Clinic::findOrFail($request->id);
        $clinic->is_trust = $request->is_trust;
        $clinic->save();
        return response()->json([
            'success' => true,
            'message' => __('lang.done'),
        ]);
    }

    public function export(Request $request)
    {
        $request->validate([
            'limit' => ['nullable', 'numeric'],
            'search' => ['nullable'],
        ]);
        return Excel::download(new ClinicsExport($request->search, $request->limit ?? 20), 'clinics.xlsx');
    }

    /**
     * show import excel modal
     * @return view
     */
    public function importModal()
    {
        return view('dashboard.clinics.import_modal');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xlsx,csv'],
        ]);

        Excel::import(new ClinicsImport, $request->file('file'));
        toast(__('lang.done'), 'success', 'top-right');
        return back();
    }

}
