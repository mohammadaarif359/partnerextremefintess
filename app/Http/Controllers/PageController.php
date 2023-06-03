<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\Inquiry;
use Validator;
use Redirect;

class PageController extends Controller
{
    public function home() {
		$urlRedirect = config('gym.main_url_admin_redirect');
		if($urlRedirect == 1) {
			return Redirect::to('/login', 301); 
		}
		$page = CmsPage::where('slug','home')->where('status',1)->first();
		if($page) {
			return view('web.home',compact('page'));
		} else {
		}
    }
	public function about() {
        $page = CmsPage::where('slug','about')->where('status',1)->first();
		if($page) {
			return view('web.about',compact('page'));
		} else {
			abort(404);
		}
    }
	public function contact() {
        $page = CmsPage::where('slug','contact')->where('status',1)->first();
		if($page) {
			return view('web.contact',compact('page'));
		} else {
			abort(404);
		}
    }
	public function privacyPolicy() {
        $page = CmsPage::where('slug','privacy-policy')->where('status',1)->first();
		if($page) {
			return view('web.privacy-policy',compact('page'));
		} else {
			abort(404);
		}
    }
	public function contactInquiry(Request $request)
	{
		$validate=Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits_between:8,12',
			'message' => 'required',
        ]);
		if ($validate->fails()) {
			return response()->json(['error'=>$validate->errors()]);
        }
		else {
			$inquiry = Inquiry::create([
				'name' => $request['name'],
				'mobile' =>  $request['mobile'],
				'message' => $request['message']
			]);
			if($inquiry) {
				return response()->json(['success'=>'Inquiry has been send successfully.we will connect you soon.','code'=>200]);
			}
		}
	}
}
