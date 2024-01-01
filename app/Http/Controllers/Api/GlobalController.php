<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddResource;
use App\Models\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalController extends Controller
{

    public function categories(Request $request)
    {
        return DB::table('categories')->take(60)->get();
    }

    public function subCategories(Request $request)
    {
        return DB::table('subcategories')->take(20)->get();
    }

    public function ads(Request $request)
    {
        $date = date('Y-m-d');
        $resources = Add::whereDate('date_from', '<=', $date)
            ->whereDate('date_to', '>=', $date)
            ->where('page', $request->page)
            ->take(10)
            ->get();

        return AddResource::collection($resources);
    }

    public function adsAddView($id, Request $request)
    {
        if (!DB::table('ads_view')->where('ads_id', $id)->where('ip', request()->ip())->exists()) {
            DB::table('ads_view')->insert([
                'ads_id' => $id,
                'ip' => request()->ip(),
            ]);
        }

        return responseJson(true, 'success');
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        DB::table('messages')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return responseJson(true, 'success');
    }

}
