<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClinicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicRequestController extends Controller
{

    public function __construct() {
        $this->middleware('permission:read-clinic_requests')->only('index');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = ClinicRequest::where('status', 'pending')->paginate(10);
        return view('dashboard.clinic_requests.index', compact('resources'));
    }

    public function changeStatus(Request $request)
    {
        $clinicRequest = ClinicRequest::find($request->id);
        try {
            DB::table('clinic_requests')
                ->where('clinic_id', $request->id)
                ->update(['status' => $request->status]);

            if ($request->status == 'approved') {
                $clinicRequest->approve();
            } else {
                $clinicRequest->reject();
            }

            return [
                'status' => true,
                'message' => __('lang.done'),
            ];
        } catch (\Exception $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

}
