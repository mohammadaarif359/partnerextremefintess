<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Partner;
use App\Exports\PartnerExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\AuthCode;
use DataTables;
use DB;
use Carbon\Carbon;

class PartnerController extends Controller
{
    use AuthCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$partners = Partner::with('partner_user')->withCount('partner_member')->get();
			return Datatables::of($partners)
				->addColumn('action', function ($data) {
					$btn = '<a href="/admin/partner/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="/admin/gym-plan?partner_id='.$data->id.'" class="" title="Plan"><i class="fa fa-tasks"></i></a>
							<a href="/admin/gym-member?partner_id='.$data->id.'" class="" title="Member"><i class="fa fa-user"></i></a>
							<a href="/admin/partner-dashboard?partner_id='.$data->id.'" class="" title="Dashboard"><i class="fas fa-tachometer-alt"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($user) {
					return [
						'display' => Carbon::parse($user->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $user->created_at
					];
				})->editColumn('status', function ($user) {
					return $user->status == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.partner.list');
	}
	public function add() {
		$roles = Role::where('name','!=','superadmin')->pluck('display_name','id')->toArray();
		return view('admin.partner.add',compact('roles'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email',
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile',
			'password'=> 'required|min:6|confirmed',
			'role'	  => 'required',	
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'logo' => 'nullable|mimes:jpeg,jpg,png',
			'business_name' => 'required',
			'owner_name' => 'required',
			'location' => 'required',
			'other_email' => 'nullable|email|unique:partners,other_email',
			'other_mobile' => 'nullable|numeric|digits_between:8,12|unique:partners,other_email',
 			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		$logo = null;
		if($request->hasFile('logo')) {
			$logo = $this->uploadImg($request->logo,'partner');
		}
		
		// user creation
		$user = User::create([
			'name'=>$request_data['name'],
			'email'=>trim($request_data['email']),
			'mobile'=>$request_data['mobile'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
			'password'=>bcrypt($request_data['password']),
			'profile_photo'=>$file_name,
		]);
		// attach role
		$user->attachRole($request->role);
		
		// partner creation
		$partner = Partner::create([
			'user_id'=>$user->id,
			'business_name'=>$request_data['business_name'],
			'owner_name'=>trim($request_data['owner_name']),
			'location'=>$request_data['location'],
			'other_email'=>$request_data['other_email'],
			'other_mobile'=>$request_data['other_mobile'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
			'logo'=>$logo,
		]);
		
		// user partner id update
		$user->update(['partner_id'=>$partner->id]);
		if($user) {
			return redirect()->route('admin.partner')->with('success', 'Partner created Successfully !');
		} else {
			return redirect()->route('admin.partner')->with('error', 'Failed to created partner !');
		}
	}
	public function edit($id) {
		$partner = Partner::with('partner_user')->where('id',$id)->first();
		if($partner) {
			$user = $partner['partner_user'];
			$roles = Role::where('name','!=','superadmin')->pluck('display_name','id')->toArray();
			$old_role = [];
			if(!empty($user['roles'])) {
				$userRoles = $user['roles'];
				foreach($userRoles as $userRole) {
					$old_role[] = $userRole->id;
				}
			}
			return view('admin.partner.edit',compact('partner','user','roles','old_role'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email,'.$request->user_id,
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile,'.$request->user_id,
			'password'=> 'nullable|min:6',
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'role'	  => 'required',
			'logo' => 'nullable|mimes:jpeg,jpg,png',
			'business_name' => 'required',
			'owner_name' => 'required',
			'location' => 'required',
			'other_email' => 'nullable|email|unique:partners,other_email,'.$request->id,
			'other_mobile' => 'nullable|numeric|digits_between:8,12|unique:partners,other_email,'.$request->id,
 			'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		$logo = null;
		if($request->hasFile('logo')) {
			$file_name = $this->uploadImg($request->logo,'partner');
		}
		
		$user = User::where('id',$request->user_id)->first();
		if($user) {
			$user->name = $request_data['name'];
			$user->email = trim($request_data['email']);
			$user->mobile = $request_data['mobile'];
			$user->profile_photo = !empty($file_name) ?  $file_name : $user->profile_photo;
			if(!empty($request_data['password'])) {
				$user->password = bcrypt($request_data['password']);
			}
			
			$user->save();
			// delete old role and new attach
			DB::table('role_user')->where('user_id',$user->id)->delete();
			$user->attachRole($request->role);
			
			// partner update
			$partner = Partner::where('id',$request['id'])->first();
			Partner::updateOrCreate([
				'id'=>$request->id,
			],[
				'user_id'=>$user->id,
				'business_name'=>$request_data['business_name'],
				'owner_name'=>trim($request_data['owner_name']),
				'location'=>$request_data['location'],
				'other_email'=>$request_data['other_email'],
				'other_mobile'=>$request_data['other_mobile'],
				'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
				'logo'=>!empty($logo) ?  $logo : $partner->logo
			]);
			
			// user partner id update
			$user->update(['partner_id'=>$partner->id]);
			return redirect()->route('admin.partner')->with('success', 'Partner updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated partner !');
		}
	}
	public function export() {
        return Excel::download(new PartnerExport(), 'partner.xlsx');
    }
}
