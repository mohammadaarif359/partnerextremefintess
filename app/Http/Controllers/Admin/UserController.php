<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Traits\AuthCode;
use App\Traits\CommonCode;
use DB;
use DataTables;
use Carbon\Carbon;

class UserController extends Controller
{
    use AuthCode,CommonCode;
	public function index(Request $request) {
		if ($request->ajax()) {
			$users = User::get();
			return Datatables::of($users)
				->addColumn('action', function ($user) {
					$btn = '<a href="/admin/user/edit/'.$user->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a><a href="/admin.user.delete/'.$user->id.'" class="" title="Delete"><i class="fa fa-trash"></i></a>';
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
		return view('admin.user.list');
	}
	public function add() {
		$roles = Role::pluck('name','id')->toArray();
		return view('admin.user.add',compact('roles'));
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
 			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
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
		return redirect()->route('admin.user')->with('success', 'User created Successfully !');
	}
	public function edit($id) {
		$user = User::where('id',$id)->first();
		if($user) {
			$roles = Role::pluck('name','id')->toArray();
			$old_role = [];
			if(!empty($user['roles'])) {
				$userRoles = $user['roles'];
				foreach($userRoles as $userRole) {
					$old_role[] = $userRole->id;
				}
				//$old_role = implode(",",$old_role);
			}
			return view('admin.user.edit',compact('user','roles','old_role'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email,'.$request->id,
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile,'.$request->id,
			'password'=> 'nullable|confirmed',
			'profile_photo' => 'nullable|mimes:jpeg,jpg,png',
			'role'	  => 'required',
 			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		$user = User::where('id',$request->id)->first();
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
			return redirect()->route('admin.user')->with('success', 'User updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated user !');
		}
		
	}
	public function delete($id) {
		$user = User::where('id',$id)->first();
		if($user) {
			$status = $this->deleteUserData($user);
			if($status) {
				return redirect()->back()->with('success', 'User deleted successfully !');
			} else {
				return redirect()->back()->with('error', 'Failed to delete user!');
			}
		} else {
			abort(404);
		}	
	}
	public function export(Request $request) {
		$query = User::select("id","name","email","mobile","status","created_at")->get();
		$heading = array("id","name","email","mobile","status","created_at");
		return $this->exportModule($model = null,$query,$heading);
	}
}
