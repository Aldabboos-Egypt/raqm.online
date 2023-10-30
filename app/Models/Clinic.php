<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Netsells\GeoScope\Traits\GeoScopeTrait;

class Clinic extends Model
{
    use HasFactory;
    use GeoScopeTrait;

    protected $primaryKey = 'clinic_id';

    protected $fillable = [
        'url',
        'title',
        'description',
        'price',
        'category_name',
        'address',
        'neighborhood',
        'street',
        'city_id',
        'postal_code',
        'state',
        'country_code',
        'website',
        'phone',
        'phone_unformatted',
        'claim_this_business',
        'latitude',
        'longitude',
        'location_name',
        'total_score',
        'permanently_closed',
        'temporarily_closed',
        'place_id',
        'reviews_count',
        'reviews_one_star',
        'reviews_two_star',
        'reviews_three_star',
        'reviews_four_star',
        'reviews_five_star',
        'images_count',
        'scraped_at',
        'reserve_table_url',
        'google_food_url',
        'hotel_stars',
        'hotel_description',
        'check_in_date',
        'check_out_date',
        'similar_hotels_nearby',
        'opening_hours',
        'amenities',
        'accepts_new_patients',
    ];

    protected $appends = [
        'contact_url',
    ];

    public function getContactUrlAttribute()
    {
        return env('FRONT_URL') . "/v/" . $this->clinic_id;
    }

    public function subCategory()
    {
        return $this->belongsToMany(Subcategory::class, 'clinic_subcategories', 'clinic_id', 'subcategory_id');
    }

    public function getViews()
    {
        return DB::table('clinic_views')->where('clinic_id', $this->clinic_id)->count();
    }
}
