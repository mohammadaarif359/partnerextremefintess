<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\{Validator, Storage};
use Symfony\Component\HttpFoundation\StreamedResponse;
use Auth;
use App\Traits\AuthCode;

class MediaController extends Controller
{
    use AuthCode;
	public function store(Request $request) {
		$request_data = $request->all();
		$validator_data = Validator::make($request_data, [
            'file'	=> 'required|mimes:jpg,jpeg,png,pdf,doc'	
        ]);
		if ($validator_data->fails()) {
            return $this->result(false, [], $validator_data->errors()->messages(), 'validation error!', 400);
        } else {
			$file_name = null;
			if($request->hasFile('file')) {
				$file_name = $this->uploadImg($request->file,'media','protected');
			}
			$media = new Media();
			$media->user_id = Auth::user() ? Auth::user()->id : 0;
			$media->name = $file_name;
			$media->save();
			return $this->result(true, [], [], 'Media uploaded successfully');
		}
	}
	public function download($id): ?StreamedResponse
	{
		$media = Media::where('id',$id)->first();
		if($media) {
			$file_path = '/media/'.$media->name;
			if (Storage::disk('protected')->exists($file_path)) {
				return Storage::disk('protected')->download($file_path);
			}
			return null;
		} else {
			return null;
		}
	}
}
