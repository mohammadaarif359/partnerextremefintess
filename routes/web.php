<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/

// web route
Route::get('/','PageController@home')->name('home');
Route::get('/about','PageController@about')->name('about');
Route::get('/contact','PageController@contact')->name('contact');
Route::get('/privacy-policy','PageController@privacyPolicy')->name('privacy-policy');
Route::post('/contact-inquiry','PageController@contactInquiry')->name('contact-inquiry');

// admin login route
Route::get('/login','Admin\AuthController@showLoginForm')->name('login');
Route::post('/login','Admin\AuthController@login')->name('login');
Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
Route::get('/password/request','Admin\ForgotPasswordController@passwordRequest')->name('password.request');
Route::post('/password/email','Admin\ForgotPasswordController@passwordRequestEmail')->name('password.email');
Route::get('/password/reset/{token}','Admin\ForgotPasswordController@passwordReset')->name('password.reset');
Route::post('/password/update','Admin\ForgotPasswordController@passwordResetUpdate')->name('password.update');

// admin after login route
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
	
	Route::middleware(['checkrole:superadmin'])->group(function(){
		// dashboard
		Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
	
		// user
		Route::get('/user','Admin\UserController@index')->name('user');
		Route::get('/user/add','Admin\UserController@add')->name('user.add');
		Route::post('/user/store','Admin\UserController@store')->name('user.store');
		Route::get('/user/edit/{id}','Admin\UserController@edit')->name('user.edit');
		Route::post('/user/update','Admin\UserController@update')->name('user.update');
		Route::get('/user/delete/{id}','Admin\UserController@delete')->name('user.delete');
		Route::get('/user/export','Admin\UserController@export')->name('user.export');
		
		// cms
		Route::get('/cms-page','Admin\CmsPageController@index')->name('cms-page');
		Route::get('/cms-page/add','Admin\CmsPageController@add')->name('cms-page.add');
		Route::post('/cms-page/store','Admin\CmsPageController@store')->name('cms-page.store');
		Route::get('/cms-page/edit/{id}','Admin\CmsPageController@edit')->name('cms-page.edit');
		Route::post('/cms-page/update','Admin\CmsPageController@update')->name('cms-page.update');
		Route::get('/cms-page/delete','Admin\CmsPageController@delete')->name('cms-page.delete');
		
		// module
		Route::match(['get', 'post', 'options'], 'module/{module}', 'Admin\ModuleController@index')->name('module');
		Route::get('/module/{module}/export','Admin\ModuleController@export')->name('module.export');
		
		// partner
		Route::get('/partner','Admin\PartnerController@index')->name('partner');
		Route::get('/partner/add','Admin\PartnerController@add')->name('partner.add');
		Route::post('/partner/store','Admin\PartnerController@store')->name('partner.store');
		Route::get('/partner/edit/{id}','Admin\PartnerController@edit')->name('partner.edit');
		Route::post('/partner/update','Admin\PartnerController@update')->name('partner.update');
		Route::get('/partner/export','Admin\PartnerController@export')->name('partner.export');
	});
	
	Route::middleware(['checkrole:superadmin,gym-partner'])->group(function(){
		// dashboard
		Route::get('/partner-dashboard','Admin\DashboardController@partner')->name('partner.dashboard');
		
		// gym member
		Route::get('/gym-member','Admin\GymMemberController@index')->name('gym-member');
		Route::get('/gym-member/add','Admin\GymMemberController@add')->name('gym-member.add');
		Route::post('/gym-member/store','Admin\GymMemberController@store')->name('gym-member.store');
		Route::get('/gym-member/edit/{id}','Admin\GymMemberController@edit')->name('gym-member.edit');
		Route::post('/gym-member/update','Admin\GymMemberController@update')->name('gym-member.update');
		Route::get('/gym-member/export','Admin\GymMemberController@export')->name('gym-member.export');
		
		// gym-plan
		Route::get('/gym-plan','Admin\GymPlanController@index')->name('gym-plan');
		Route::get('/gym-plan/add','Admin\GymPlanController@add')->name('gym-plan.add');
		Route::post('/gym-plan/store','Admin\GymPlanController@store')->name('gym-plan.store');
		Route::get('/gym-plan/edit/{id}','Admin\GymPlanController@edit')->name('gym-plan.edit');
		Route::post('/gym-plan/update','Admin\GymPlanController@update')->name('gym-plan.update');
		Route::get('/gym-plan/export','Admin\GymPlanController@export')->name('gym-plan.export');
		
		// member-plan
		Route::get('/member-plan/{member_id}','Admin\MemberPlanController@index')->name('member-plan');
		Route::get('/member-plan/{member_id}/add','Admin\MemberPlanController@add')->name('member-plan.add');
		Route::post('/member-plan/store','Admin\MemberPlanController@store')->name('member-plan.store');
		Route::get('/member-plan/{member_id}/edit/{id}','Admin\MemberPlanController@edit')->name('member-plan.edit');
		Route::post('/member-plan/update','Admin\MemberPlanController@update')->name('member-plan.update');
		
		// mmeber-fee
		Route::get('/member-fee/{member_id}','Admin\MemberFeeController@index')->name('member-fee');
		Route::get('/member-fee/{member_id}/add','Admin\MemberFeeController@add')->name('member-fee.add');
		Route::post('/member-fee/store','Admin\MemberFeeController@store')->name('member-fee.store');
		Route::get('/member-fee/{member_id}/edit/{id}','Admin\MemberFeeController@edit')->name('member-fee.edit');
		Route::post('/member-fee/update','Admin\MemberFeeController@update')->name('member-fee.update');
	});	
});
