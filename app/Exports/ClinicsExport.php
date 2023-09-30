<?php

namespace App\Exports;

use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClinicsExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $limit;
    public function __construct($search, $limit)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Clinic::select(
            '*',
            DB::raw('(select subcategory_id from clinic_subcategories where clinic_subcategories.clinic_id = clinics.clinic_id) as subcategory_id'),
        )->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('price', $this->search)
            ->take($this->limit)->get();
    }

    public function headings(): array
    {
        return [
            "clinic_id",
            "url",
            "title",
            "description",
            "price",
            "category_name",
            "address",
            "neighborhood",
            "street",
            "city_id",
            "postal_code",
            "state",
            "country_code",
            "website",
            "phone",
            "phone_unformatted",
            "claim_this_business",
            "latitude",
            "longitude",
            "location_name",
            "total_score",
            "permanently_closed",
            "temporarily_closed",
            "place_id",
            "reviews_count",
            "reviews_one_star",
            "reviews_two_star",
            "reviews_three_star",
            "reviews_four_star",
            "reviews_five_star",
            "images_count",
            "scraped_at",
            "reserve_table_url",
            "google_food_url",
            "hotel_stars",
            "hotel_description",
            "check_in_date",
            "check_out_date",
            "similar_hotels_nearby",
            "opening_hours",
            "amenities",
            "accepts_new_patients",
            "subcategory_id",
            'created_at',
            'updated_at',
        ];
    }
}
