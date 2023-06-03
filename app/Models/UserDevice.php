<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;
	protected $fillable = [
        'user_id',
        'udid',
		'type',
        'token',
		'status'
    ];
	/* device user relation */
	public function device_user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
	/* To send push notification to user's device */
	public function sendPush($user_id = null, $msg = null, $data=array(), $title = '',$image_url = null){
		if(empty($user_id)) {
			$devices = UserDevice::all();
		} else {
			$devices = UserDevice::where('user_id', $user_id)->get();
		}
		if($devices){
			foreach($devices as $device){	
				$device_token = $device->token;
				$this->fcm($device_token, $msg, $data, $title,$image_url);
			}
		}
	}
	public function fcm($deviceToken = null, $message = null, $data = array(), $title = "Jaquar",$image_url = null)
	{
		//$FCM_AUTH_KEY_JAQUAR = "AAAA-85y0yg:APA91bHEnQd81mgLt3KYHIhujf8Vh5Ioy280YfE1KgfB2gXrAsOyXMeze5REdPE7CPWHXMPTJ3XHO7eH5S-6rRcd7pJCEgbqMn65Vg6HCrO_bqEXH_g0N4UwtEU7kqEOa6S9yaDh4oxy";
		$FCM_AUTH_KEY_JAQUAR = "AAAAiu7e984:APA91bFqr2sKwbsoQdcLRa3Q4cItRhdsBXdMo20Xs6x_apFRQ7FUD2BwShQl5aSYVPdrY5fB0zmeNjpibcsdt5bYqyWmkl0fN-HcMi2Dyja6iM1c0LE_el6bxy-12z18gndaifHriRqa";
		
		$ch = curl_init("https://fcm.googleapis.com/fcm/send");

		//This array contains, the token and the notification. The 'to' attribute stores the token.
		$notification['title'] = $title;
		$notification['text'] = $message;
		$notification['image_url'] = $image_url;
		$notification['priority'] = 'high';
		$notification['sound'] = 0;
		$arrayToSend = array('to' => $deviceToken, 'notification' => $notification, 'data' => $data);
		
		//Generating JSON encoded string form the above array.
		$json = json_encode($arrayToSend);

		//Setup headers:
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: key= '.$FCM_AUTH_KEY_JAQUAR; //server key here

		//Setup curl, add headers and post parameters.
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);		

		//Send the request
		$response = curl_exec($ch);
		
		//Close request
		curl_close($ch);
		return $response;
	}
}
