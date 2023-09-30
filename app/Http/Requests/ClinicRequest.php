<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subcategory_id' => ['required'],
            "url" => ['nullable'],
            "title" => ['nullable'],
            "description" => ['nullable'],
            "price" => ['nullable'],
            "category_name" => ['nullable'],
            "address" => ['nullable'],
            "neighborhood" => ['nullable'],
            "street" => ['nullable'],
            "city_id" => ['nullable'],
            "postal_code" => ['nullable'],
            "state" => ['nullable'],
            "country_code" => ['nullable'],
            "website" => ['nullable'],
            "phone" => ['nullable'],
            "phone_unformatted" => ['nullable'],
            "claim_this_business" => ['nullable'],
            "latitude" => ['nullable'],
            "longitude" => ['nullable'],
            "location_name" => ['nullable'],
            "total_score" => ['nullable'],
            "permanently_closed" => ['nullable'],
            "temporarily_closed" => ['nullable'],
            "place_id" => ['nullable'],
            "reviews_count" => ['nullable'],
            "reviews_one_star" => ['nullable'],
            "reviews_two_star" => ['nullable'],
            "reviews_three_star" => ['nullable'],
            "reviews_four_star" => ['nullable'],
            "reviews_five_star" => ['nullable'],
            "images_count" => ['nullable'],
            "scraped_at" => ['nullable'],
            "reserve_table_url" => ['nullable'],
            "google_food_url" => ['nullable'],
            "hotel_stars" => ['nullable'],
            "hotel_description" => ['nullable'],
            "check_in_date" => ['nullable'],
            "check_out_date" => ['nullable'],
            "similar_hotels_nearby" => ['nullable'],
            "opening_hours" => ['nullable'],
            "amenities" => ['nullable'],
            "accepts_new_patients" => ['nullable']
        ];
    }
}
