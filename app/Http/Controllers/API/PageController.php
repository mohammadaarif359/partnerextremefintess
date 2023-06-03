<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Traits\AuthCode;

class PageController extends Controller
{
    use AuthCode;
	public function about() {
		$data = CmsPage::where('slug','about')->where('status',1)->first();
		if($data) {
			return $this->result(true, [$data], [], 'success');
		} else {
			return $this->result(false, [], []);
		}
	}
	public function privacyPolicy(Request $request) {
		$type = isset($request->type) ? $request->type :  'url';
		$data = CmsPage::where('slug','privacy-policy')->where('status',1)->first();
		if($data) {
			return $this->result(true, [$data], [], 'success');
		} else {
			return $this->result(false, [], []);
		}
	}
}
