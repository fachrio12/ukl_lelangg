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
Route::post('/register','UserController@register');
Route::post('/login','UserController@login');

Route::group(['middleware'=>['jwt.verify']],function()
{

    Route::group(['middleware' => ['api.superadmin']], function ()
    {
        Route::delete('/barang','barangController@destroy');
        Route::delete('/masyarakat','masyarakatController@destroy');
        Route::delete('/petugas','petugasController@destroy');
    });   

    Route::group(['middleware' => ['api.admin']], function ()
    {
        Route::post('/barang','barangController@store');
        Route::put('/barang','barangController@update');
        Route::post('/masyarakat','masyarakatController@store');
        Route::put('/masyarakat','masyarakatController@update');
        Route::post('/petugas','petugasController@store');
        Route::put('/petugas','petugasController@update');
    });  

Route::get('/barang','barangController@show');
Route::get('/barang/{id}','barangController@detail');

Route::get('/masyarakat','masyarakatController@show');
Route::get('/masyarakat/{id}','masyarakatController@detail');

Route::get('/petugas','petugasController@show');
Route::get('/petugas/{id}','petugasController@detail');


});

