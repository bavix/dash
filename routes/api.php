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

Route::get('/services', function (Request $request) {
    dispatch(new \App\Jobs\InspectorJob());
    return response()->noContent();
});

Route::post('/service/start', function (Request $request) {
    $class = $request->input('class');
    $service = app(\App\PackageService::class)->getService($class);
    dispatch(new \App\Jobs\EnableJob($service));
    return response()->noContent();
});

Route::post('/service/stop', function (Request $request) {
    $class = $request->input('class');
    $service = app(\App\PackageService::class)->getService($class);
    dispatch(new \App\Jobs\DisableJob($service));
    return response()->noContent();
});

Route::post('/service/restart', function (Request $request) {
    $class = $request->input('class');
    $service = app(\App\PackageService::class)->getService($class);
    dispatch(new \App\Jobs\RebootJob($service));
    return response()->noContent();
});
