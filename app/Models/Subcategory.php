<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function clinics() {
        return $this->belongsToMany(Clinic::class, 'clinic_subcategories', 'subcategory_id', 'clinic_id');
    }
}
