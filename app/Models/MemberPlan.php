<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPlan extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'plan_id','member_id','amount','start_date','end_date','remark','status'
    ];
	/* member partner relation */
	public function member_partner()
    {
       return $this->belongsTo(Partner::class, 'partner_id');
    }
	/* member plan relation */
	public function member_plan()
    {
       return $this->belongsTo(GymPlan::class, 'plan_id');
    }
	/* asso plan member relation */
	public function assoc_plan_member()
    {
       return $this->belongsTo(GymMember::class, 'member_id');
    }
	/* member asso plan relation */
	public function active_assoc_plan_member()
    {
       return $this->belongsTo(GymMember::class, 'member_id')->where('status',1);
    }
}
