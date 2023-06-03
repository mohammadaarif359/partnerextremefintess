<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMember extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'partner_id','name','email','mobile','age','blood_group','joining_date','address','profile_photo','other_mobile','last_fee_month','next_fee_month','status'
    ];
	
	protected $appends = [
        'profile_photo_url',
    ];
	/* user profile image url */
	public function getProfilePhotoUrlAttribute(): string
    {
        return $this->profile_photo ? asset('storage/members/'.$this->profile_photo)  : "";
    }
	
	/* member partner relation */
	public function member_partner()
    {
       return $this->belongsTo(Partner::class, 'partner_id');
    }
	/* member asso plan relation */
	public function assoc_plan()
    {
       return $this->HasMany(MemberPlan::class, 'member_id','id');
    }
	/* member asso plan relation */
	public function active_assoc_plan()
    {
       return $this->HasOne(MemberPlan::class, 'member_id','id')->where('status',1);
    }
	// member fee relation
	public function member_fee() {
		return $this->HasMany(MemberFee::class, 'member_id','id');
	}
}
