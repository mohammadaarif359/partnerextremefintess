<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpVerification;
use App\Models\UserDevice;
use Illuminate\Support\Facades\{Auth,Validator};
use App\Traits\AuthCode;
use Hash;
use Laravel\Passport\Passport;
use Carbon\Carbon;
use DB;

class AuthController extends Controller
{
    use AuthCode;
	public function signup(Request $request) {
		$request_data = $request->all();
		$validator_data = Validator::make($request_data, [
            'name'    => 'required|regex:/^[\pL\s]+$/u',
            'email'   => 'required|email|unique:users,email',
            'password'=> 'required|min:6',
            'mobile'  => 'required|numeric|digits_between:8,12',
			'role'    => 'required|exists:roles,id'
        ]);
		$file_name = null;
		if($request->hasFile('profile_photo')) {
			$file_name = $this->uploadImg($request->profile_photo,'users');
		}
		if ($validator_data->fails()) {
            return $this->result(false, [], $validator_data->errors()->messages(), 'validation error!', 400);
        } else {
			$user = new User;
			$user->name     = $request_data['name'];
			$user->email    = trim($request_data['email']);
			$user->mobile   = $request_data['mobile'];
			$user->password = bcrypt($request_data['password']);
			$user->status   = 1;
			$user->image = $file_name;
			$user->save();
			// attach role
			$user->attachRole($request->role);
			return $this->result(true, [], [], 'User register successfully');
		}	
	}
	public function login(Request $request) {
		$request_data = $request->all();
		$validator_data = Validator::make($request_data, [
            'username'   => 'required',
            'password'=> 'required',
            //'mobile'  => 'required|numeric|digits_between:8,12',
        ]);
		if ($validator_data->fails()) {
            return $this->result(false, [], $validator_data->errors()->messages(), 'validation error!', 400);
        } else {
			if (Auth::attempt(['email' => request('username'), 'password' => request('password')]) || Auth::attempt(['mobile' => request('username'), 'password' => request('password')])) {
                $user = Auth::user();
				if(!$user->status) {
				  return $this->result(false, [], [], 'Your account is not activated');
				}
				if(!$user->hasRole('user')) {
				  return $this->result(false, [], [], 'Your have not permission to login here');	
				}
            } else {
				return $this->result(false, [], [], 'Username or password may be incorrect.');
			}
			$data['id'] = $user['id'];
			$data['name'] = $user['name'];
			$data['email']  = $user['email'];
			$data['mobile'] = $user['mobile'];
			$data['status'] = $user['status'];
			$data['profile_photo'] = $user['profile_photo'];
			$data['profile_photo_url'] = $user['profile_photo_url'];
			$data['role'] = $this->getUserRoleWithId($user);
			$data['token'] = $user->createToken('mobile')->accessToken;
			return $this->result(true, [$data], [], 'User logged in successfully');
		}	
	}
	public function logout(Request $request) {
        $user = Auth::user();
        $user->token()->revoke();
        $user->token()->delete();
        return $this->result(true, [], [], 'Logout successfully');
    }
	public function saveDevice(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'udid'   => 'required',
            'type'   => 'required|in:ANDROID,IOS',
            'token'  => 'required',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $this->result(false, [], $validator->errors(), 'validation error!', 400);
        } else {
            Userdevice::where('token', $request['token'])->delete();

            $deviceData = [
                'user_id' => $request['user_id'],
                'udid'   => $request['udid'],
                'type'   => $request['type'],
                'token'  => $request['token'],
                'status' => $request['status'],
            ];

            $device = Userdevice::create($deviceData);

            return $this->result(true, [$device], [], 'User device saved successfully');
        }
    }
	public function isLogged(Request $request) {
        return $this->result(true, [], [], 'Authorized User');
    }
	public function forgetPasswordRequest(Request $request) {
		$validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->messages();
            return $this->result(false, [], $error, 'validation error!', 400);
        } else {
			$user = User::where('email', $request['email'])->first();
			if($user) {
				$token = $this->generateUniqueForgotToken();
				$user->forgot_password_token = $token;
				$user->save();
				$otpData = OtpVerification::create([
					'user_id'=>$user->id,
					'attribute_type'=>'email',
					'attribute_value'=>$request->email,
					'otp'=>"FOUR"
				]);
				if($otpData['attribute_type'] == 'email') {
					$data['name'] = $otpData['otp_user']['name'];
					$data['email'] = $otpData['attribute_value'];
					$data['otp'] = $otpData['otp'];
					$data['message'] = trans('sms.sendOTP', ['OTP' => $otpData['otp']]);		
					$this->sendEmailVerification($data);
					$responseMg = 'OTP to reset password has sent to you email id';
				} else {
					$data['message'] = trans('sms.sendOTP', ['OTP' => $otpData['otp']]);
					$this->sendMobileVerification($otpData['attribute_value'],$data['message']);
					$responseMg = 'OTP to reset password has sent to you mobile no';
				}
				return $this->result(true, [$token], [],$responseMg);
			} else {
				return $this->result(false, [], [], 'Email does not exist.');
			}
		}	
	}
	public function forgetOtpVerify(Request $request) {
		$request_data = $request->all();
		$validator = Validator::make($request->all(), [
            'token'    => 'required|exists:users,forgot_password_token',
            'otp'    => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->messages();
            return $this->result(false, [], $error, 'validation error!', 400);
        } else {
            $user = User::where('forgot_password_token', $request['token'])->first();
			if($user) {
				$otpData = OtpVerification::where('user_id',$user->id)->where('otp',$request->otp)->first();
				if($otpData) {
					$otpData->delete();
					$token = $this->generateUniqueForgotToken();
					$user->forgot_password_token = $token;
					$user->save();		
					return $this->result(true,[$token],[],'Otp verified successfully.');
				} else {
					return $this->result(false, [], [], 'Invalid otp.');
				}	
			} else {
				return $this->result(false, [], [], 'Token does not exist.');
			}
		}	
	}
	public function forgetPasswordReset(Request $request) {
		$request_data = $request->all();
		$validator = Validator::make($request->all(), [
            'token'    => 'required|exists:users,forgot_password_token',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->messages();
            return $this->result(false, [], $error, 'validation error!', 400);
        } else {
            $user = User::where('forgot_password_token', $request['token'])->first();
			if($user) {
				$user->forgot_password_token = null;
				$user->password = bcrypt($request['password']);
				$user->save();
				return $this->result(true,[],[],'Password reset successfully.');
			} else {
				return $this->result(false, [], [], 'Token does not exist.');
			}
		}	
	}
	public function changePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password'     => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->result(false, [], $validator->errors()->messages(), 'validation error!', 400);
        } else {
            $user = Auth::user();
			if(Hash::check($request['current_password'],$user->password)) {
                $user->password = bcrypt($request['new_password']);
                $user->save();
                // Logout user
                $user->token()->revoke();
                $user->token()->delete();
                return $this->result(true, [], [], 'Password updated successfully.');
            } else {
                return $this->result(false, [], [], 'Incorrect current password.');
            }
        }
    }
}
