<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
use App\Models\GymMember;
use App\Traits\AuthCode;
use App\Exports\GymMemberExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GymMemberController extends Controller
{
    use AuthCode;
	public function index(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->get('partner_id');
		if ($request->ajax()) {
			$memebers = GymMember::with(['active_assoc_plan','active_assoc_plan.member_plan'])->where('partner_id',$partner_id)->get();
			return Datatables::of($memebers)
				->addColumn('action', function ($data) use($partner_id) {
					$btn = '<a href="/admin/gym-member/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
					<a href="/admin/member-plan/'.$data->id.'?partner_id='.$partner_id.'" class="" title="Member Plan"><i class="fa fa-list"></i></a>';
					
					if(!empty($data->active_assoc_plan)) {
						$btn = $btn.' <a href="/admin/member-fee/'.$data->id.'?partner_id='.$partner_id.'" class="" title="Member Fee"><i class="fa fa-wallet"></i></a>';
					}
					return $btn;
				})->editColumn('joining_date', function ($data) {
					return [
						'display' => Carbon::parse($data->joining_date)->format('d-m-Y'),
						'timestamp' => $data->joining_date
					];
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->status == 1 ? 'Active' : 'Deactive';
				})->editColumn('profile_photo_url', function ($data) {
					if(!empty($data->profile_photo_url)) {
						$btn = '<img src="'.$data->profile_photo_url.'" class="img img-resposive" height="100px" width="100px">';
					} else {
						$btn = '';
					}
					return $btn;	
				})->addColumn('plan_title', function ($data) {
					return !empty($data->active_assoc_plan) && isset($data->active_assoc_plan->member_plan) ? $data->active_assoc_plan->member_plan['title'] : ''; 
				})->addColumn('plan_duration', function ($data) {
					return !empty($data->active_assoc_plan) && isset($data->active_assoc_plan->member_plan) ? $data->active_assoc_plan->member_plan['duration'] : ''; 
				})->addColumn('amount', function ($data) {
					return !empty($data->active_assoc_plan) ? $data->active_assoc_plan['amount'] : ''; 
				})->rawColumns(['profile_photo_url','action'])
				->make(true);
		}
		return view('admin.gym-member.list',compact('partner_id'));
	}
	public function add(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		return view('admin.gym-member.add',compact('partner_id'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'partner_id'=> 'required',
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'nullable|email|unique:gym_members,email',
            'mobile'  => 'required|numeric|digits_between:8,12|unique:gym_members,mobile',
			'address' => 'required',
			'age'	  => 'required|numeric',
			'joining_date' => 'required',
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'other_mobile'  => 'nullable|numeric|digits_between:8,12',
 			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'members');
		}
		$member = GymMember::create([
			'partner_id'=>$request_data['partner_id'],
			'name'=>$request_data['name'],
			'email'=>trim($request_data['email']),
			'mobile'=>$request_data['mobile'],
			'address'=>$request_data['address'],
			'age'=>$request_data['age'],
			'joining_date'=>$request_data['joining_date'],
			'blood_group'=>$request_data['blood_group'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
			'profile_photo'=>$file_name,
		]);
		
		if($member) {
			$member['message'] = trans('sms.memberWelcome', ['joining_date' => date('d-m-Y',strtotime($member->joining_date)),'partner_mobile'=>$member->member_partner->partner_user->mobile]);
			$this->sendMemberWelcomeEmail($member);
		}
		return redirect()->route('admin.gym-member',['partner_id' => $request_data['partner_id']])->with('success', 'Member added Successfully !');
	}
	public function edit($id) {
		$data = GymMember::where('id',$id)->first();
		if($data) {
			return view('admin.gym-member.edit',compact('data'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'partner_id' => 'required',
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:gym_members,email,'.$request->id,
            'mobile'  => 'required|numeric|digits_between:8,12|unique:gym_members,mobile,'.$request->id,
			'address' => 'required',
			'age'	  => 'required',
			'joining_date' => 'required',
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'other_mobile'  => 'nullable|numeric|digits_between:8,12',
 			'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'members');
		}
		$member = GymMember::where('id',$request->id)->first();
		if($member) {
			$member->partner_id = $request_data['partner_id'];
			$member->name = $request_data['name'];
			$member->email = $request_data['email'];
			$member->mobile = $request_data['mobile'];
			$member->address = $request_data['address'];
			$member->age = $request_data['age'];
			$member->joining_date = $request_data['joining_date'];
			$member->blood_group = $request_data['blood_group'];
			$member->status = $request_data['status'];
			$member->profile_photo = !empty($file_name) ? $file_name : $member->profile_photo;
 			$member->save();
			
			return redirect()->route('admin.gym-member',['partner_id' => $request_data['partner_id']])->with('success', 'Member updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated member not found !');
		}
	}
	public function export(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
        return Excel::download(new GymMemberExport($partner_id), 'gym-member.xlsx');
    }
}
