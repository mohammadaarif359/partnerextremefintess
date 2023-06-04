<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberFee;
use App\Models\MemberPlan;
use App\Models\GymMember;
use App\Exports\GymPlanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberFeeController extends Controller
{
    public function index(Request $request,$member_id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		if ($request->ajax()) {
			$memeberFees = MemberFee::where('member_id',$member_id)->get();
			return Datatables::of($memeberFees)
				->addColumn('action', function ($data) use($partner_id) {
					$btn = '<a href="/admin/member-fee/'.$data->member_id.'/edit/'.$data->id.'?partner_id='.$partner_id.'" class="" title="Edit"><i class="fa fa-edit"></i></a></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})
				->make(true);
		}
		return view('admin.member-fee.list',compact('partner_id','member_id'));
	}
	public function add(Request $request, $member_id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		$memberPlan = MemberPlan::where('member_id',$member_id)->where('status',1)->first();
		if($memberPlan) {
			$gymMember = GymMember::where('id',$member_id)->first();
			if(!empty($gymMember->last_fee_month)) {
				$duration = (int) $memberPlan->member_plan->duration;
				$memberPlan->fee_month = date("Y-m-d", strtotime($gymMember->last_fee_month . "+".$duration." months"));
			} else {
				$memberPlan->fee_month = $memberPlan->start_date;	
			}
			return view('admin.member-fee.add',compact('partner_id','member_id','memberPlan'));
		} else {
			return back()->with('error', 'Member plan not found!'); 
		}
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'member_id'=> 'required',
			'member_plan_id' => 'required',
			'amount' => 'required|numeric',
			'fee_month' => 'required|date',
			'recieved_at' => 'required|date',
			'recieved_by' => 'required'
		]);
		$fee = MemberFee::create([
			'member_id'=>$request_data['member_id'],
			'member_plan_id'=>$request_data['member_plan_id'],
			'amount'=>$request_data['amount'],
			'fee_month' =>$request_data['fee_month'],
			'recieved_at'=>$request_data['recieved_at'],
			'recieved_by'=>$request_data['recieved_by'],
			'remark'=>$request_data['remark'],
		]);
		if($fee) {
			$member = GymMember::where('id',$request_data['member_id'])->first();
			$duration = $member->active_assoc_plan->member_plan->duration;
			if(!empty($member->last_fee_month)) {
				if(strtotime($member->last_fee_month) < strtotime($request_data['fee_month'])) {
					$member->last_fee_month = $request_data['fee_month'];
					$member->next_fee_month = date("Y-m-d", strtotime($member->last_fee_month . "+".$duration." months"));
					$member->save();
				}
			} else {
				$member->last_fee_month = $request_data['fee_month'];
				$member->next_fee_month = date("Y-m-d", strtotime($member->last_fee_month . "+".$duration." months"));
				$member->save();
			}
		}
		return redirect()->route('admin.member-fee',[$request_data['member_id'],'partner_id' => $request_data['partner_id']])->with('success', 'Member fee submited Successfully !');
	}
	public function edit(Request $request,$member_id,$id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		$data = MemberFee::where('member_id',$member_id)->where('id',$id)->first();
		if($data) {
			return view('admin.member-fee.edit',compact('data','partner_id','member_id'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' => 'required',
			'member_id'=> 'required',
			'member_plan_id' => 'required',
			'amount' => 'required|numeric',
			'fee_month' => 'required|date',
			'recieved_at' => 'required|date',
			'recieved_by' => 'required'
		]);
		$data = MemberFee::where('id',$request->id)->first();
		if($data) {
			$fee = MemberFee::updateOrcreate(
			[
				'id'=>$request_data['id'],
			],[
				'member_id'=>$request_data['member_id'],
				'member_plan_id'=>$request_data['member_plan_id'],
				'amount'=>$request_data['amount'],
				'fee_month' =>$request_data['fee_month'],
				'recieved_at'=>$request_data['recieved_at'],
				'recieved_by'=>$request_data['recieved_by'],
				'remark'=>$request_data['remark'],
			]);
			$member = GymMember::where('id',$request_data['member_id'])->first();
			$duration = $member->active_assoc_plan->member_plan->duration;
			if(!empty($member->last_fee_month)) {
				if(strtotime($member->last_fee_month) < strtotime($request_data['fee_month'])) {
					$member->last_fee_month = $request_data['fee_month'];
					$memeber->next_fee_month = date("Y-m-d", strtotime($member->last_fee_month . "+".$duration." months"));
					$member->save();
				}
			} else {
				$member->last_fee_month = $request_data['fee_month'];
				$member->next_fee_month = date("Y-m-d", strtotime($member->last_fee_month . "+".$duration." months"));
				$member->save();
			}
			return redirect()->route('admin.member-fee',[$request_data['member_id'],'partner_id' => $request_data['partner_id']])->with('success', 'Fee updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated fee not found !');
		}
	}
	public function export() {
        return Excel::download(new GymPlanExport(), 'gym-plan.xlsx');
    }
}
