<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('post_login', 'App\Http\Controllers\Userscontroller@loginweb');
Route::get('adminpage', 'App\Http\Controllers\Userscontroller@getadmindash')->name('adminpage');
Route::get('adddriver', 'App\Http\Controllers\Userscontroller@getdrivers')->name('adddriver');
Route::post('registerdriver', 'App\Http\Controllers\Userscontroller@Registersdriver')->name('adddriverform');
Route::post('storescustomer', 'App\Http\Controllers\Userscontroller@RegisterCustomer');
Route::post('storesadmin', 'App\Http\Controllers\Userscontroller@Registeradmin');
Route::get('customers', 'App\Http\Controllers\Userscontroller@getcustomers')->name('customer');
Route::get('admins', 'App\Http\Controllers\Userscontroller@getadmins')->name('addadmin');
Route::delete('deleterecords/{id}', 'App\Http\Controllers\Userscontroller@deleterecord');
Route::get('editstudent/{id}', 'App\Http\Controllers\Userscontroller@editstudent');
Route::put('updatestudent/{id}', 'App\Http\Controllers\Userscontroller@updatestudent');

Route::get('editdriver/{id}', 'App\Http\Controllers\Userscontroller@editteacher');
Route::put('updatedriver/{id}', 'App\Http\Controllers\Userscontroller@updateteacher');
Route::delete('deleterecords/{id}', 'App\Http\Controllers\Userscontroller@deleterecord');
Route::post('fetch-constituencies', 'App\Http\Controllers\Userscontroller@fetchConstintuencies');



Route::post('select_date', 'App\Http\Controllers\Home2Controller@createdhistory');

Route::post('select_date2', 'App\Http\Controllers\Home2Controller@pasthistory');
