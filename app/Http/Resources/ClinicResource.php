<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ClinicResource extends JsonResource
{

    public function toArray($request)
    {
        $this->addView();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'is_trust' => $this->is_trust,
            'mobile' => $this->mobile,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'views' => $this->views,
            'city' => $this->city,
            'subcategory' => $this->subcategory,
            'contact_url' => $this->contact_url,
            'has_mobile' => $this->has_mobile,
            'subcategory_id' => $this->subcategory_id,
            'is_favorite' => $this->is_favorite ?? false,
        ];
    }

    public function addView()
    {
        if (DB::table('clinic_views')->where('clinic_id', $this->id)->where('ip', request()->ip())->exists()) {
            return;
        }
        DB::table('clinic_views')->insert([
            'clinic_id' => $this->id,
            'ip' => request()->ip(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
