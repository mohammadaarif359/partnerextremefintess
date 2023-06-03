<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\OtpVerification;
use App\Traits\AuthCode;
use Illuminate\Support\Facades\{DB,Auth,Validator};

class UserController extends Controller
{
    use AuthCode;
	public function userProfile() {
		$user = Auth::user();
		$data = $user;
		return $this->result(true, [$data], [], 'User profile get successfully');
	}
	public function userUpdate(Request $request) {
		$user = Auth::user();
		$request_data = $request->all();
		$validator_data = Validator::make($request_data, [
            'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email,'.$user->id,
            'mobile'  => 'required|numeric|digits_between:8,12|unique:users,mobile,'.$user->id,
        ]);
		if ($validator_data->fails()) {
            return $this->result(false, [], $validator_data->errors()->messages(), 'validation error!', 400);
        } else {
			$file_name = null;
			if($request->hasFile('profile_photo')) {
				$file_name = $this->uploadImg($request->profile_photo,'users');
			}
			$user->name     = $request_data['name'];
			$user->email    = trim($request_data['email']);
			$user->mobile   = $request_data['mobile'];
			$user->profile_photo 	= !empty($file_name) ?  $file_name : $user->profile_photo;
			$user->save();
			return $this->result(true, [], [], 'User updated successfully');
		}
	}
	public function userDelete() {
		$user = Auth::user();
		if($user) {
			$this->deleteUserData($user);
			if($status) {
				return $this->result(true, [], [], 'User deleted successfully');
			} else {
				return $this->result(false, [], [], 'Failed to delete user');
			}
		} else {
			return $this->result(false, [], [], 'User not found');
		}	
	}
}
