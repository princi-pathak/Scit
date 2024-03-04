<?php
    use App\http\RotaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rota-dashboard','App\Http\Controllers\RotaController@index');
Route::get('/rota','App\Http\Controllers\RotaController@create');
Route::post('/add-rota-data','App\Http\Controllers\RotaController@store');
Route::get('/rota-planner','App\Http\Controllers\RotaController@rota_calender_view');

Route::post('/add-shift-data','App\Http\Controllers\RotaController@add_shift_data');

Route::get('/get-all-users','App\Http\Controllers\RotaController@get_all_users');
Route::post('/assign_rota_users','App\Http\Controllers\RotaController@assign_rota_users');
Route::post('/update_rota_name','App\Http\Controllers\RotaController@update_rota_name');
Route::post('/publish_rota_employee','App\Http\Controllers\RotaController@publish_rota_employee');
Route::post('/unpublish_rota_employee','App\Http\Controllers\RotaController@unpublish_rota_employee');


Route::get('/calender','App\Http\Controllers\RotaController@calender_view');
Route::get('/absence/type={id}','App\Http\Controllers\RotaController@annual_leave_view');
Route::post('/get-all-users-search','App\Http\Controllers\RotaController@get_all_users_search');

Route::post('/delete_rota_employee','App\Http\Controllers\RotaController@delete_rota_employee');
Route::get('/edit_rota/{id}','App\Http\Controllers\RotaController@edit_rota');
Route::post('/publish_unpublish_rota','App\Http\Controllers\RotaController@publish_unpublish_rota');

Route::post('/add-leave','App\Http\Controllers\RotaController@add_leave');
Route::post('/date_validation_for_user','App\Http\Controllers\RotaController@date_validation_for_user');


Route::get('/pending-request','App\Http\Controllers\RotaController@leave_pending');
Route::get('/get_all_leave','App\Http\Controllers\RotaController@get_all_leave');
Route::get('/employee','App\Http\Controllers\RotaController@employee_view');
Route::post('/get_rota_employee','App\Http\Controllers\RotaController@get_rota_employee');
Route::post('/get_all_shift','App\Http\Controllers\RotaController@get_all_shift');
Route::post('/edit_shift_data_get','App\Http\Controllers\RotaController@edit_shift_data_get');
Route::post('/update-shift-data','App\Http\Controllers\RotaController@update_shift_data');
Route::post('/approve_leave','App\Http\Controllers\RotaController@approve_leave');
Route::post('/get_leave_record_for_1_week','App\Http\Controllers\RotaController@get_leave_record_for_1_week');

Route::post('/get_record_of_rota','App\Http\Controllers\RotaController@get_record_of_rota');
Route::get('/get_all_rota_data','App\Http\Controllers\RotaController@get_all_rota_data');

