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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create_a_password/{token}','FirstLoginController@index')->middleware('IsFirstLogin');
Route::post('/create_a_password','FirstLoginController@storePassword')->name('password.create');
Route::get('/notifications','NotificationController@index')->name('notifications')->middleware('auth');
Route::post('/notifications/mark_as_seen/{id}','NotificationController@markAsSeen')->name('notification.seen');

Route::get('/test','TestController@email'); // delete

Route::get("/unauthorized",function(){
    return '401';
});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('/home','HomeController@index')->name('home')->middleware('auth:admin');
    Route::resource('doctor','DoctorController')->name('*','doctor')->middleware('auth:admin');
    Route::resource('speciality','SpecialityController')->name('*','speciality')->middleware('auth:admin');
    Route::resource('hospital','HospitalController')->name('*','hospital')->middleware('auth:admin');
    Route::resource("/dashboard",'DashboardController')->name('*','dashboard')->middleware('auth:admin');
    Route::get("dashboard/manage/{uuid}",'HospitalController@show')->middleware('auth:admin');
    Route::resource("notification",'NotificationController')->name('*','notification')->middleware('auth:admin');

    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
    
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    
    });

});