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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['access_control:admin,student']], function (){
    Route::resource('student', 'StudentController');
    Route::group(['middleware' => ['access_control:admin']], function (){
        Route::resource('subject', 'SubjectController');
        Route::resource('user', 'UserController');
    });
});

Route::get('/', 'LoginController@login');
Route::get('login', 'LoginController@login')->name('login');
Route::post('post-login', 'LoginController@postLogin')->name('post-login');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('new-password', 'LoginController@newPassword')->name('new-password');
Route::post('post-new-password', 'LoginController@postNewPassword')->name('post-new-password');

Route::get('login/forgot-password', 'LoginController@forgotPassword')->name('login.forgot-password');
Route::post('login/post-forgot-password', 'LoginController@postForgotPassword')->name('login.post-forgot-password');

Route::get('reset-password/{token}', 'LoginController@resetPassword')->name('reset-password');
Route::post('post-reset-password/{token}', 'LoginController@postResetPassword')->name('post-reset-password');
