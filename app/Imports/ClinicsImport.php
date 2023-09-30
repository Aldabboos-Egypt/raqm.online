<?php

namespace App\Imports;

use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClinicsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $clinic = Clinic::where('clinic_id', $row['clinic_id'])->first();

        //dd($row);
        if (!$clinic) {
            //dd($row);
            $clinic = Clinic::create([
                //"clinic_id" => $row['clinic_id'],
                "url" => $row['url'],
                "title" => $row['title'],
                "description" => $row['description'],
                "price" => $row['price'],
                "category_name" => $row['category_name'],
                "address" => $row['address'],
                "neighborhood" => $row['neighborhood'],
                "street" => $row['street'],
                "city_id" => $row['city_id'],
                "postal_code" => $row['postal_code'],
                "state" => $row['state'],
                "country_code" => $row['country_code'],
                "website" => $row['website'],
                "phone" => $row['phone'],
                "phone_unformatted" => $row['phone_unformatted'],
                "claim_this_business" => $row['claim_this_business'],
                "latitude" => $row['latitude'],
                "longitude" => $row['longitude'],
                "location_name" => $row['location_name'],
                "total_score" => $row['total_score'],
                "permanently_closed" => $row['permanently_closed'],
                "temporarily_closed" => $row['temporarily_closed'],
                "place_id" => $row['place_id'],
                "reviews_count" => $row['reviews_count'],
                "reviews_one_star" => $row['reviews_one_star'],
                "reviews_two_star" => $row['reviews_two_star'],
                "reviews_three_star" => $row['reviews_three_star'],
                "reviews_four_star" => $row['reviews_four_star'],
                "reviews_five_star" => $row['reviews_five_star'],
                "images_count" => $row['images_count'],
                "scraped_at" => $row['scraped_at'],
                "reserve_table_url" => $row['reserve_table_url'],
                "google_food_url" => $row['google_food_url'],
                "hotel_stars" => $row['hotel_stars'],
                "hotel_description" => $row['hotel_description'],
                "check_in_date" => $row['check_in_date'],
                "check_out_date" => $row['check_out_date'],
                "similar_hotels_nearby" => $row['similar_hotels_nearby'],
                "opening_hours" => $row['opening_hours'],
                "amenities" => $row['amenities'],
                "accepts_new_patients" => $row['accepts_new_patients'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $clinic->update([
                "clinic_id" => $row['clinic_id'],
                "url" => $row['url'],
                "title" => $row['title'],
                "description" => $row['description'],
                "price" => $row['price'],
                "category_name" => $row['category_name'],
                "address" => $row['address'],
                "neighborhood" => $row['neighborhood'],
                "street" => $row['street'],
                "city_id" => $row['city_id'],
                "postal_code" => $row['postal_code'],
                "state" => $row['state'],
                "country_code" => $row['country_code'],
                "website" => $row['website'],
                "phone" => $row['phone'],
                "phone_unformatted" => $row['phone_unformatted'],
                "claim_this_business" => $row['claim_this_business'],
                "latitude" => $row['latitude'],
                "longitude" => $row['longitude'],
                "location_name" => $row['location_name'],
                "total_score" => $row['total_score'],
                "permanently_closed" => $row['permanently_closed'],
                "temporarily_closed" => $row['temporarily_closed'],
                "place_id" => $row['place_id'],
                "reviews_count" => $row['reviews_count'],
                "reviews_one_star" => $row['reviews_one_star'],
                "reviews_two_star" => $row['reviews_two_star'],
                "reviews_three_star" => $row['reviews_three_star'],
                "reviews_four_star" => $row['reviews_four_star'],
                "reviews_five_star" => $row['reviews_five_star'],
                "images_count" => $row['images_count'],
                "scraped_at" => $row['scraped_at'],
                "reserve_table_url" => $row['reserve_table_url'],
                "google_food_url" => $row['google_food_url'],
                "hotel_stars" => $row['hotel_stars'],
                "hotel_description" => $row['hotel_description'],
                "check_in_date" => $row['check_in_date'],
                "check_out_date" => $row['check_out_date'],
                "similar_hotels_nearby" => $row['similar_hotels_nearby'],
                "opening_hours" => $row['opening_hours'],
                "amenities" => $row['amenities'],
                "accepts_new_patients" => $row['accepts_new_patients'],
                'updated_at' => Carbon::now(),
            ]);
        }

        if (isset($row['subcategory_id'])) {
            DB::table('clinic_subcategories')->where('clinic_id', $clinic->id)->delete();
            DB::table('clinic_subcategories')->insert([
                'clinic_id' => $clinic->id,
                'subcategory_id' => $row['subcategory_id'],
            ]);
        }
    }
}
