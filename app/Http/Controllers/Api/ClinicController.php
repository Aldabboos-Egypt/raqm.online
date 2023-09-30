<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicsResource;
use App\Models\Clinic;
use App\Models\ClinicComment;
use App\Models\ClinicRequest;
use App\Models\GeographicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->input('search');

        return DB::table('clinics')->where(function ($q) use ($search) {
            $q
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere(
                    DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1)"),
                    'like',
                    '%' . $search . '%'
                )
            ;
        })
            ->whereNotNull(
                DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1)")
            )
            ->select(
                'clinic_id as id',
                'title',
                DB::raw("(select city from geographicdata where geographicdata.city_id = clinics.city_id limit 1) as city"),
                DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1) as subcategory"),
            )
        //->having('subcategory')
            ->take(10)
            ->get();
    }

    public function favourites(Request $request)
    {
        // Get clinics with specified fields
        $clinics = Clinic::join(
            'favourites', 'favourites.clinic_id', '=', 'clinics.clinic_id'
        )
            ->where('user_id', auth('api')->user()->user_id)
            ->select(
                'clinics.clinic_id',
                'clinics.clinic_id as id',
                'title',
                'address',
                'description',
                'is_trust',
                DB::raw("CONCAT(SUBSTRING(phone, 1, 3), 'xxxxxxx') as mobile"),
                'latitude',
                'longitude',
                DB::raw("(select IF(count(id) > 0, 1, 0) from favourites where favourites.clinic_id = clinics.clinic_id) as is_favorite"),
                DB::raw("(select count(ip) from clinic_views where clinic_views.clinic_id = clinics.clinic_id) as views"),
                DB::raw("(select city from geographicdata where geographicdata.city_id = clinics.city_id limit 1) as city"),
                DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1) as subcategory"),
            )
            ->paginate(100);

        return response(new ClinicsResource($clinics));
        //return ClinicResource::collection($clinics);
    }

    public function index(Request $request)
    {
        // $subcategoryIds = array_filter($request->subcategory_ids, function ($v, $k) {
        //     return $v > 0;
        // }, ARRAY_FILTER_USE_BOTH);

        // return $subcategoryIds;

        $condition = auth('api')->user() ? " and favourites.user_id = " . auth('api')->user()->user_id : '';
        $search = $request->input('search');
        // Get clinics with specified fields
        $clinics = Clinic::join(
            'clinic_subcategories', 'clinic_subcategories.clinic_id', '=', 'clinics.clinic_id'
        )->where(function ($q) use ($request) {
            if ($request->lat && $request->lng) {
                $q->withinDistanceOf($request->lat, $request->lng, 5)->get();
            }
        })
            ->where(function ($q) use ($search) {
                $q
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere(
                        DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1)"),
                        'like',
                        '%' . $search . '%'
                    )
                ;
            })
            ->where(function ($q) use ($request) {
                if ($request->contact_id) {
                    $q->where('clinics.clinic_id', $request->contact_id);
                }
            })
            ->where(function ($q) use ($request) {
                if ($request->subcategory_ids) {
                    $subcategoryIds = array_filter($request->subcategory_ids, function ($v, $k) {
                        return $v > 0;
                    }, ARRAY_FILTER_USE_BOTH);
                    if (count($subcategoryIds) > 0) {
                        $q->whereIn('clinic_subcategories.subcategory_id', $subcategoryIds);
                    }

                }
            })
            ->where(function ($q) use ($request) {
                if ($request->result_type) {
                    switch ($request->result_type) {
                        case 'with_phone':
                            $q->whereNotNull('phone');
                            break;
                        case 'without_phone':
                            $q->whereNull('phone');
                            break;
                    }
                }
            })
            ->select(
                'clinics.clinic_id',
                'clinics.clinic_id as id',
                'title',
                'address',
                'description',
                'is_trust',
                DB::raw("CONCAT(SUBSTRING(phone, 1, 3), 'xxxxxxx') as mobile"),
                DB::raw("IF(phone, 1, 0) as has_mobile"),
                'latitude',
                'longitude',
                DB::raw("(select IF(count(id) > 0, 1, 0) from favourites where favourites.clinic_id = clinics.clinic_id $condition) as is_favorite"),
                DB::raw("(select count(ip) from clinic_views where clinic_views.clinic_id = clinics.clinic_id) as views"),
                DB::raw("(select city from geographicdata where geographicdata.city_id = clinics.city_id limit 1) as city"),
                DB::raw("(select subcategories.id from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1) as subcategory_id"),
                DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1) as subcategory"),
            )
            ->whereNotNull(DB::raw("(select name from subcategories where subcategories.id in (select clinic_subcategories.subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) limit 1)"));
        // ->groupBy('clinics.clinic_id')
        //->paginate(6);

        $query = clone $clinics;

        return response(new ClinicsResource($clinics->paginate(6), $query));
        //return ClinicResource::collection($clinics);
    }

    public function getPhone($id)
    {
        $phone = optional(DB::table('clinics')->where('clinic_id', $id)->first())->phone;
        return [
            'status' => 1,
            'data' => $phone,
        ];
    }

    public function favourite(Clinic $id, Request $request)
    {
        if ($id) {
            if ($request->is_favorite) {
                DB::table('favourites')->insert([
                    'clinic_id' => $id->clinic_id,
                    'user_id' => auth('api')->user()->user_id,
                ]);
            } else {
                DB::table('favourites')
                    ->where('clinic_id', $id->clinic_id)
                    ->where('user_id', auth('api')->user()->user_id)
                    ->delete();
            }
            return responseJson(true, __('lang.done'));
        } else {
            return responseJson(false, __('data not found'));
        }
    }

    public function show($clinicId)
    {
        $clinic = Clinic::findOrFail($clinicId);
        $clinicData = $clinic->toArray(request());

        // Get GeographicData by city_id
        $geographicData = GeographicData::getByCityId($clinicData['city_id']);

        // Add the GeographicData to the clinic data
        $clinicData['geographicdata'] = $geographicData;

        return response()->json($clinicData);
    }

    public function sendComment(Request $request)
    {
        if ($request->id) {
            ClinicComment::create([
                'clinic_id' => $request->id,
                'comment' => $request->comment,
                'user_id' => auth('api')->user()->user_id,
            ]);

            return responseJson(true, __('lang.done'));
        } else {
            return responseJson(false, __('data not found'));
        }
    }

    public function sendRequest(Request $request)
    {
        if ($request->id) {
            ClinicRequest::create([
                'clinic_id' => $request->id,
                'subcategory_id' => $request->subcategory_id,
                'description' => $request->description,
                'name' => $request->name,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'notes' => $request->notes,
                'user_id' => auth('api')->user()->user_id,
            ]);

            return responseJson(true, __('lang.done'));
        } else {
            return responseJson(false, __('data not found'));
        }
    }

}
