<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//customer api
Route::post('logincustomer', 'App\Http\Controllers\CustomerApiController@CustomerloginApi');
Route::post('registercustomer', 'App\Http\Controllers\CustomerApiController@RegisterCustomer');
Route::post('StoreCustomerRideRequest', 'App\Http\Controllers\CustomerApiController@StoreCustomerRideRequest');
Route::get('fetchcostomersride/{id}', 'App\Http\Controllers\CustomerApiController@getcustomersrides');

//driver api
Route::post('logindriver', 'App\Http\Controllers\DriverApiController@DriverloginApi');
Route::post('registerdriver', 'App\Http\Controllers\DriverApiController@Registersdriver');
Route::post('updateonline', 'App\Http\Controllers\DriverApiController@updateONLINEstatus');
Route::post('updateoffline', 'App\Http\Controllers\DriverApiController@updateOFFLINEstatus');
Route::get('fetchcostomersrequest', 'App\Http\Controllers\DriverApiController@getcustomersrequest');

//counties and subcounties 
Route::get('fetchcounties', 'App\Http\Controllers\DriverApiController@fetch_counties');
Route::get('fetchconstituencies/{countyid}', 'App\Http\Controllers\DriverApiController@fetch_constituencies');