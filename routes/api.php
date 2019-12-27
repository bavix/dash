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

Route::get('/services', 'ApiController@index');
Route::post('/service/start', 'ApiController@start');
Route::post('/service/stop', 'ApiController@stop');
Route::post('/service/restart', 'ApiController@restart');
