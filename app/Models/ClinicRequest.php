<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicRequest extends Model
{
    use HasFactory;

    protected $table = 'clinic_requests';

    protected $fillable = [
        'clinic_id', 'user_id', 'subcategory_id', 'name', 'phone', 'whatsapp', 'description', 'notes', 'latitude', 'longitude', 'status',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'clinic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function approve()
    {
        $data = [];
        if ($this->name) {
            $data['title'] = $this->name;
        }

        if ($this->description) {
            $data['description'] = $this->description;
        }

        if ($this->phone) {
            $data['phone'] = $this->phone;
        }

        if ($this->latitude) {
            $data['latitude'] = $this->latitude;
        }

        if ($this->longitude) {
            $data['longitude'] = $this->longitude;
        }

        $this->clinic->update($data);
        $this->update([
            'status' => 'approved',
        ]);
    }

    public function reject()
    {
        $this->update([
            'status' => 'rejected',
        ]);
    }

}
