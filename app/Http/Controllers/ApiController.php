<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        dispatch(new \App\Jobs\InspectorJob());
        return response()->noContent();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function start(Request $request): Response
    {
        $class = $request->input('class');
        $service = app(\App\PackageService::class)->getService($class);
        dispatch(new \App\Jobs\EnableJob($service));
        return response()->noContent();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function stop(Request $request): Response
    {
        $class = $request->input('class');
        $service = app(\App\PackageService::class)->getService($class);
        dispatch(new \App\Jobs\DisableJob($service));
        return response()->noContent();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function restart(Request $request): Response
    {
        $class = $request->input('class');
        $service = app(\App\PackageService::class)->getService($class);
        dispatch(new \App\Jobs\RebootJob($service));
        return response()->noContent();
    }

}
