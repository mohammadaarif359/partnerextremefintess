<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id',
        'business_name',
		'owner_name',
        'logo',
		'location',
		'other_email',
		'other_mobile',
		'status'
    ];
	
	protected $appends = [
        'logo_url',
    ];
	
	/* partner logo url */
	public function getLogoUrlAttribute(): string
    {
        return $this->logo ? asset('storage/partner/'.$this->logo)  : "";
    }
	
	/* user partner relation */
	public function partner_user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
	/* partner gym plan relation */
	public function partner_plan()
    {
        return $this->hasMany(GymPlan::class,'partner_id','id');
    }
	/* partner memebr relation */
	public function partner_member()
    {
        return $this->hasMany(GymMember::class,'partner_id','id');
    }
}
