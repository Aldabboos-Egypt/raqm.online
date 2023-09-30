<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicData extends Model
{
    use HasFactory;
    protected $table = 'geographicdata';
    protected $primaryKey = 'city_id';
    protected $fillable = [
        'city',
        'state',
        'country_code',
    ];

    public static function getByCityId($cityId)
    {
        return static::where('city_id', $cityId)->first();
    }
}
