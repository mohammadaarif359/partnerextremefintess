<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Traits\AuthCode;

class NotificationController extends Controller
{
    use AuthCode;
	public function index(Request $request)
    {
        $offset = $request->input('offset', 0);
		$limit  = $request->input('limit', 0);
		$query = Notification::where('status',1)->whereRaw('DATE(created_at) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
        if ($limit != 0) {
            $query->skip($offset);
            $query->take($limit);
        }
        $query->orderBy('created_at', 'DESC');
        $notifications = $query->get();
        return $this->result(true, $notifications, [], 'success');
    }
}
