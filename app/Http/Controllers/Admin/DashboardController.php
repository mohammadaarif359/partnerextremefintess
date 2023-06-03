<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\{Partner,GymMember,GymPlan,MemberFee,MemberPlan};
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request) {
		if(isset($request->filter_date) && !empty($request->filter_date)) {
			$time = strtotime($request->filter_date);
			$start_date = date('Y-m-01 h:i:s',$time);
			$end_date = date('Y-m-t h:i:s',$time);
			$current_month_year = date('M Y',$time);
			$filter_date = date('Y-m',$time);
		} else {
			$start_date = date('Y-m-01 h:i:s');
			$end_date = date('Y-m-t h:i:s');
			$current_month_year = date('M Y');
			$filter_date = date('Y-m');
		}
		$count = [];
		$count['total_partner'] = Partner::count();
		$count['total_member'] = GymMember::count();
		$count['new_partner'] = Partner::whereBetween('created_at',[$start_date,$end_date])->count();
		$count['new_member'] = GymMember::whereBetween('created_at',[$start_date,$end_date])->count();
		return view('admin.dashboard.index',compact('count','filter_date','current_month_year'));
	}
	public function partner(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->get('partner_id'); 
		if(isset($request->filter_date) && !empty($request->filter_date)) {
			$time = strtotime($request->filter_date);
			$fee_start_date = date('Y-m-01',$time);
			$fee_end_date = date('Y-m-t',$time);
			$current_month = date('m',$time);
			$current_month_year = date('M Y',$time);
			$filter_date = date('Y-m',$time); 
			
		} else {
			$fee_start_date = date('Y-m-01');
			$fee_end_date = date('Y-m-t');
			$current_month = date('m');
			$current_month_year = date('M Y');
			$filter_date = date('Y-m');
		}
		$count = [];
		$count['total_member'] = GymMember::where('partner_id',$partner_id)->count();
		$count['active_member'] = GymMember::where('partner_id',$partner_id)->where('status',1)->count();
		$count['total_plan'] = GymPlan::where('partner_id',$partner_id)->count();
		$count['fee_recieved'] = MemberFee::whereHas('fee_member',function($q) use($partner_id){
									$q->where('partner_id',$partner_id);
								})->whereBetween('fee_month',[$fee_start_date,$fee_end_date])->sum('amount');		
		$count['fee_due'] = 0;
		$fee_due_members = [];
		$fee_due_count = 0;
		$fee_recieved_members = [];
		$fee_recieved_count = 0;
		$members = GymMember::WhereHas('assoc_plan',function($q) use($fee_start_date,$fee_end_date){
								$q->whereBetween('start_date',[$fee_start_date,$fee_end_date]);
								$q->OrWhereBetween('end_date',[$fee_start_date,$fee_end_date]);
								$q->orWhere(function ($query) use($fee_start_date,$fee_end_date) {
									$query->where('start_date','<=',$fee_start_date)
										->where('end_date','>=',$fee_end_date);
								});
					})->where('partner_id',$partner_id)->where('status',1)->get();			
		foreach($members as $member) {
				$assoc_plan = $member->assoc_plan;
				$assoc_plan_month = MemberPlan::where('member_id',$member->id)
									->where(function($q) use($fee_start_date,$fee_end_date){
										$q->whereBetween('start_date',[$fee_start_date,$fee_end_date]);
										$q->OrWhereBetween('end_date',[$fee_start_date,$fee_end_date]);
										$q->orWhere(function ($query) use($fee_start_date,$fee_end_date) {
											$query->where('start_date','<=',$fee_start_date)
												->where('end_date','>=',$fee_end_date);
										});
									})->first();		
				$plan_start_date = $assoc_plan_month->start_date;
				$duration = $assoc_plan_month->member_plan->duration;
				$fee_date = $plan_start_date;
				
				while(strtotime(date('Y-m',strtotime($fee_date))) < strtotime(date('Y-m',strtotime($fee_end_date)))) {
					$fee_date = date("Y-m-d", strtotime($fee_date . "+".$duration." months"));
					
				}
				$assoc_plan_month['due_date'] = $fee_date;
				if(strtotime(date('Y-m',strtotime($fee_date))) == strtotime(date('Y-m',strtotime($fee_end_date)))) {
					if(MemberFee::where('member_id',$member->id)->whereMonth('fee_month',$current_month)->exists()) {
							$fee_recieved_members[$fee_recieved_count] = $member;
							$fee_recieved_members[$fee_recieved_count]['assoc_plan_month'] = $assoc_plan_month;
							$fee_recieved_count++;
					} else {
						$fee_due_members[$fee_due_count] = $member;
						$fee_due_members[$fee_due_count]['assoc_plan_month'] = $assoc_plan_month;
						$count['fee_due'] += $assoc_plan_month->amount;
						$fee_due_count++;
					}
				}				
		}	
				  
		/*$members = GymMember::with('active_assoc_plan','active_assoc_plan.member_plan')->whereHas('active_assoc_plan')
				  ->where('partner_id',$partner_id)->where('status',1)->get();
		foreach($members as $k=>$member) {
			$memberMonth = GymMember::where(function($q) use($current_month){
					$q->whereMonth('last_fee_month',$current_month);
					$q->orWhereMonth('next_fee_month',$current_month);					
				  })->where('id',$member->id)->first();
			if(!empty($memberMonth)) {
				if(MemberFee::where('member_id',$member->id)->whereMonth('fee_month',$current_month)->exists()) {
						$fee_recieved_members[$fee_recieved_count] = $member;
						$fee_recieved_count++;
				} else {
					$fee_due_members[$fee_due_count] = $member;
					$count['fee_due'] += $member->active_assoc_plan->amount;
					$fee_due_count++;
				}
			} else {
				$plan_start_date = $member->active_assoc_plan->start_date;
				$duration = $member->active_assoc_plan->member_plan->duration;
				$fee_date = $plan_start_date;
				
				while(strtotime(date('Y-m',strtotime($fee_date))) < strtotime(date('Y-m',strtotime($fee_end_date)))) {
					$fee_date = date("Y-m-d", strtotime($fee_date . "+".$duration." months"));
					
				}
				if(strtotime(date('Y-m',strtotime($fee_date))) == strtotime(date('Y-m',strtotime($fee_end_date)))) {
					if(MemberFee::where('member_id',$member->id)->whereMonth('fee_month',$current_month)->exists()) {
							$fee_recieved_members[$fee_recieved_count] = $member;
							$fee_recieved_count++;
					} else {
						$fee_due_members[$fee_due_count] = $member;
						$count['fee_due'] += $member->active_assoc_plan->amount;
						$fee_due_count++;
					}
				}
			}	
		}*/
		/*$members = GymMember::with('active_assoc_plan','active_assoc_plan.member_plan')->whereHas('active_assoc_plan')
				  ->where('partner_id',$partner_id)->where('status',1)
				  ->where(function($q) use($current_month){
					$q->whereMonth('last_fee_month',$current_month);
					$q->orWhereMonth('next_fee_month',$current_month);					
				  })->get();
		foreach($members as $k=>$member) {
			if(MemberFee::where('member_id',$member->id)->whereMonth('fee_month',$current_month)->exists()) {
				$fee_recieved_members[$fee_recieved_count] = $member;
				$fee_recieved_count++;
			} else {
				$fee_due_members[$fee_due_count] = $member;
				$count['fee_due'] += $member->active_assoc_plan->amount;
				$fee_due_count++;
			}
		}*/
		$count['total_fee'] = $count['fee_recieved']+$count['fee_due'];
				  
		return view('admin.dashboard.partner',compact('partner_id','count','fee_due_members','fee_recieved_members','current_month_year','filter_date'));
	}
}
