<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\GymMember;
use App\Models\GymPlan;
use App\Models\MemberPlan;
use App\Traits\AuthCode;
use App\Exports\GymPlanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberPlanController extends Controller
{
    use AuthCode;
	public function index(Request $request,$member_id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		if ($request->ajax()) {
			$memeberPlans = MemberPlan::with(['member_plan'])->where('member_id',$member_id)->get();
			return Datatables::of($memeberPlans)
				->addColumn('action', function ($data) use($partner_id){
					$btn = '<a href="/admin/member-plan/'.$data->member_id.'/edit/'.$data->id.'?partner_id='.$partner_id.'" class="" title="Edit"><i class="fa fa-edit"></i></a><a href="/admin.user.delete/'.$data->id.'" class="" title="Delete"><i class="fa fa-trash"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->status == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.member-plan.list',compact('partner_id','member_id'));
	}
	public function add(Request $request, $member_id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		$plans = GymPlan::where('partner_id',$partner_id)->where('status',1)->get();
		$gymMember = GymMember::where('id',$member_id)->first();
		if(!empty($gymMember->active_assoc_plan)) {
			$duration = 1;
			$start_date = date("Y-m-d", strtotime($gymMember->active_assoc_plan->end_date . "+".$duration." days"));
		} else {
			$start_date = $gymMember->joining_date;
		}
		return view('admin.member-plan.add',compact('partner_id','member_id','plans','start_date'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$date = date("Y-m-d");
		$date = strtotime(date("Y-m-d", strtotime($date)) . "-2 months");
		$date = date("Y-m-d",$date);
		$request->validate([
			'partner_id'=> 'required',
			'member_id'    => 'required',
			'plan_id' => 'required',
			'amount' => 'required|numeric',
			'start_date' => 'required|date|after:'.$date,
			'end_date' => 'required|after:start_date'
		]);
		MemberPlan::where('member_id',$request_data['member_id'])->update(['status'=>0]);
		$plan = MemberPlan::create([
			'member_id'=>$request_data['member_id'],
			'plan_id'=>$request_data['plan_id'],
			'amount'=>$request_data['amount'],
			'start_date'=>$request_data['start_date'],
			'end_date'=>$request_data['end_date'],
			'remark'=>$request_data['remark'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
		]);
		if($plan) {
			GymMember::where('id',$request_data['member_id'])->update(['next_fee_month'=>$request_data['start_date']]);
			// send plan email
			$data['name'] = $plan->active_assoc_plan_member->name;
			$data['email'] = $plan->active_assoc_plan_member->email;
			$data['message'] = trans('sms.memberPlan', ['title'=>$plan->member_plan->title,'duration'=>$plan->member_plan->duration,'amount'=>$plan->amount,'start_date' => date('d-m-Y',strtotime($plan->start_date))]);
			$data['partner'] = Partner::where('id',$request_data['partner_id'])->first();
			$this->sendMemberPlanEmail($data);
			
		}
		return redirect()->route('admin.member-plan',$request_data['member_id'])->with('success', 'Member plan assign Successfully !');
	}
	public function edit(Request $request,$member_id,$id) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		$data = MemberPlan::where('member_id',$member_id)->where('id',$id)->first();
		if($data) {
			$plans = GymPlan::where('partner_id',$partner_id)->where('status',1)->get();
			return view('admin.member-plan.edit',compact('data','plans','partner_id','member_id'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'member_id' => 'required',
			'plan_id' => 'required',
			'amount' => 'required|numeric',
			'start_date' => 'required|date',
			'end_date' => 'required|after:start_date',
			'status'  => 'required|boolean',
		]);
		$plan = MemberPlan::where('id',$request->id)->first();
		if($plan) {
			if($plan->status == 0 && $request_data['status'] == 1) {
				MemberPlan::where('member_id',$request_data['member_id'])->update(['status'=>0]);
			}
			$plan->member_id = $request_data['member_id'];
			$plan->plan_id = $request_data['plan_id'];
			$plan->amount = $request_data['amount'];
			$plan->start_date = $request_data['start_date'];
			$plan->end_date = $request_data['end_date'];
			$plan->remark = $request_data['remark'];
			$plan->status = $request_data['status'];
 			$plan->save();
			return redirect()->route('admin.member-plan',$request_data['member_id'])->with('success', 'Plan updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated plan not found !');
		}
	}
	public function export() {
        return Excel::download(new GymPlanExport(), 'gym-plan.xlsx');
    }
}
