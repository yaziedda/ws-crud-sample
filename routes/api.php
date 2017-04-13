<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/karyawan/all', 'KaryawanCT@all');
Route::post('/karyawan/insert', 'KaryawanCT@insert');
Route::post('/karyawan/update', 'KaryawanCT@update');
Route::post('/karyawan/delete', 'KaryawanCT@delete');