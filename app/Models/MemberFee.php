<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFee extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'member_id','member_plan_id','amount','fee_month','recieved_at','recieved_by','remark'
    ];
	/* fee memeber relation */
	public function fee_member()
    {
       return $this->belongsTo(GymMember::class, 'member_id');
    }
}
