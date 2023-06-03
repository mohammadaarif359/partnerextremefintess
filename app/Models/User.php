<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
		'mobile',
        'password',
		'status',
		'forgot_password_token',
		'profile_photo',
		'partner_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	protected $appends = [
        'profile_photo_url',
    ];
	/* user profile image url */
	public function getProfilePhotoUrlAttribute(): string
    {
        return $this->profile_photo ? asset('storage/users/'.$this->profile_photo)  : "";
    }
	/* user otp relation */
	public function user_otp()
    {
        return $this->hasMany(OtpVerification::class,'user_id','id');
    }
	/* user device relation */
	public function user_device()
    {
        return $this->hasMany(UserDevice::class,'user_id','id');
    }
	public function roles()
    {	
		return $this->belongsToMany('App\Models\Role');
    }
	public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
	public function attachRole($role) {
        if (is_object($role)) {
            $role = $role->getKey();
        }
        if (is_array($role)) {
            $role = $role['id'];
        }
		$this->roles()->attach($role);
    }
	public function role()
	{
		return $this->belongsTo('App\Models\Role');
	}
	public function getAllUsers($filters = null)
    {
        $rows = (isset($filters['num_rows'])) ? $filters['num_rows'] : 10;

        $categories = self::where(function ($q) use ($filters) {
            if (!empty($filters['search_name'])) {
                $q->where("name", "like", $filters['search_name'] . "%");
            }
        })->orderBy('id', 'ASC')->paginate($rows);

        return $categories;
    }
	/* user partner relation */
	public function user_partner()
    {
        return $this->hasOne(Partner::class,'user_id','id');
    }
}
