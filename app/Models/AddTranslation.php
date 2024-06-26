<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTranslation extends Model
{
    use HasFactory;

    protected $table = 'add_translaitons';

    protected $fillable = ['title', 'description'];

    public $timestamps = false;
}
