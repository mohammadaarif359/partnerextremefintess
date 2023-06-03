<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymPlan extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'partner_id','title','duration','amount','desciption','status'
    ];
	/* gym plan partner relation relation */
	public function plan_partner()
    {
       return $this->belongsTo(Partner::class, 'partner_id');
    }
	/* plan member relation */
	public function plan_member()
    {
        return $this->hasMany(MemberPlan::class,'plan_id','id');
    }
}
