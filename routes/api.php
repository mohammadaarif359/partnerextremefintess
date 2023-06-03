<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
// auth
Route::post('/signup', 'AuthController@signup');
Route::post('/login', 'AuthController@login');
Route::post('/password/request', 'AuthController@forgetPasswordRequest');
Route::post('/password/otp-verify', 'AuthController@forgetOtpVerify');
Route::post('/password/reset', 'AuthController@forgetPasswordReset');

// notification
Route::get('/notification', 'NotificationController@index');

// page
Route::get('/about','PageController@about');
Route::get('/privacy-policy','PageController@privacyPolicy');

// after login route
Route::group(['middleware' => 'auth:api'], function () {
	Route::post('/is_logged', 'AuthController@isLogged');
	Route::get('/logout', 'AuthController@logout');
	Route::post('/save-device', 'AuthController@saveDevice');
	Route::post('/password/change', 'AuthController@changePassword');
	// user
	Route::get('/user-profile', 'UserController@userProfile');
	Route::post('/user-update', 'UserController@userUpdate');
	Route::post('/user-delete', 'UserController@userDelete');
	// media
	Route::post('/media-upload', 'MediaController@upload');
	Route::get('/media-download/{id}', 'MediaController@download');
});	

