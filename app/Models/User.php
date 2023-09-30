<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    public const PENDING = 'pending';
    public const ACTIVE = 'active';
    public const BLOCK = 'block';
    public const STATUS = [
        self::PENDING,
        self::ACTIVE,
        self::BLOCK,
    ];
    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'image',
        'phone',
        'oauth_id',
        'oauth_type',
        'verification_key',
        'registration_date',
        'date_verify_key',
        'status',
    ];

    // add image url append attribute
    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : null;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isPending()
    {
        return $this->status == self::PENDING;
    }

    public static function createFromGoogle($data)
    {
        if (User::where('oauth_id', $data->id)->exists()) {
            return User::where('oauth_id', $data->id)->first();
        }
        return User::create([
            'username' => $data->name,
            'email' => $data->email,
            'image' => $data->avatar,
            'oauth_id' => $data->id,
            'oauth_type' => "google",
            'status' => User::ACTIVE,
            'phone' => "-",
            'password' => "-",
            'registration_date' => Carbon::now(),
        ]);
    }
}
