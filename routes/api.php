<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Android\AndroidApiController;
Route::post('/user-login', 'App\Http\Controllers\Android\AndroidApiController@user_login');
Route::get('/get-leave-list', 'App\Http\Controllers\Android\AndroidApiController@get_leave_list');
Route::post('/add-user-leave', 'App\Http\Controllers\Android\AndroidApiController@add_user_leave');
Route::post('/get-user-leave', 'App\Http\Controllers\Android\AndroidApiController@get_user_leave');
Route::post('/add-login-activity', 'App\Http\Controllers\Android\AndroidApiController@add_login_activity');
Route::post('/check-out-activity', 'App\Http\Controllers\Android\AndroidApiController@check_out_activity');
Route::post('/get-user-activity', 'App\Http\Controllers\Android\AndroidApiController@get_user_activity');
// Route::post('/qrcode', 'Android\AndroidApiController@QRCode');
Route::post('/get-company-data', 'App\Http\Controllers\Android\AndroidApiController@get_company_data');

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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
