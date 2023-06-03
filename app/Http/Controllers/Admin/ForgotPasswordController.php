<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpVerification;
use App\Traits\AuthCode;
use validate;

class ForgotPasswordController extends Controller
{
    use AuthCode;
	public function passwordRequest() {
		return view('admin.auth.forgot');
	}
	public function passwordRequestEmail(Request $request) {
		$request->validate([
			'email' => 'required|email|exists:users,email',
        ]);
		
		$user = User::where('email', $request['email'])->first();
		if($user) {
			$token = $this->generateUniqueForgotToken();
			$user->forgot_password_token = $token;
			$user->save();
			$data['name'] = $user['name'];
			$data['email'] = $user['email'];
			$data['message'] = trans('sms.passwordReset');
			$data['url'] = url('/password/reset/'.$token); 
			$this->sendEmailResetLink($data);
			return back()->with('success','We have send an reset password link to your register email.');
		} else {
			return redirect()->back()->withInput($request->input())->withErrors(['email' => 'Email does not exist']);
		}	
	}
	public function passwordReset($token) {
		$user = User::where('forgot_password_token',$token)->first();
		if($user) {
			return view('admin.auth.reset',compact('token'));	
		} else {
			return redirect('password/request')->with('error','Forgot password token not found please re-enter email');
			abort(404);
		}
	}
	public function passwordResetUpdate(Request $request) {
		$request_data = $request->all();
		request()->validate([
            'token'    => 'required|exists:users,forgot_password_token',
            'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
        ]);
		$user = User::where('forgot_password_token', $request['token'])->first();
		if($user) {
			$user->forgot_password_token = null;				
			$user->password = bcrypt($request['password']);
			$user->save();
			return redirect('/login')->with('success','Password reset successfully Use this password to login');
		} else {
			return redirect()->back()->withInput($request->input())->withErrors(['to' => 'Forgot password token does not exist']);
		}	
	}
}
