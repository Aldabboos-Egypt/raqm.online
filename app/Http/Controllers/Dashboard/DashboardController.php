<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Add;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Clinic;
use App\Models\ClinicComment;
use App\Models\ClinicRequest;
use App\Models\GeographicData;
use App\Models\Role;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $data = [
            'category' => Category::count(),
            'clinics' => Clinic::count(),
            'clinic_requests' => ClinicRequest::count(),
            'clinic_comments' => ClinicComment::count(),
            'adds' => Add::count(),
            'admin' => Admin::count(),
            'geographicdata' => GeographicData::count(),
            'subcategory' => Subcategory::count(),
            'role' => Role::count(),
            'approved' => ClinicRequest::where('status', 'approved')->count(),
            'rejected' => ClinicRequest::where('status', 'rejected')->count(),
            'chart' => $this->getChart(),
        ];
        return view('dashboard.index', compact('data'));
    }

    public function getChart()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        $chart = DB::table('clinic_views')
            ->whereBetween(DB::raw('Date(clinic_views.created_at)'), [$startOfMonth, $endOfMonth])
            ->groupBy(['clinic_views.clinic_id', 'created_at'])
            ->select(
                DB::raw('CONCAT(MONTH(CREATED_AT), "/", DAY(CREATED_AT)) as title'),
                DB::raw('count(ip) as total')
            )
            ->get();

        return $chart;
    }
}
