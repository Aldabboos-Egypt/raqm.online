<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClinicComment;

class ClinicCommentController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read-clinic_comments')->only('index');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = ClinicComment::paginate(10);
        return view('dashboard.clinic_comments.index', compact('resources'));
    }

}
