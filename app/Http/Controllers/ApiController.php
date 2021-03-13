<?php

namespace App\Http\Controllers;

use App\Jobs\InspectorJob;
use App\Jobs\UnitRestartJob;
use App\Jobs\UnitStartJob;
use App\Jobs\UnitStopJob;
use App\Jobs\UnitSwitchJob;
use App\Units\MultiWanRouter;
use App\Units\UnitInterface;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function index(): Response
    {
        dispatch(new InspectorJob());
        return response()->noContent();
    }

    public function start(UnitInterface $unit): Response
    {
        dispatch(new UnitStartJob($unit));
        return response()->noContent();
    }

    public function stop(UnitInterface $unit): Response
    {
        dispatch(new UnitStopJob($unit));
        return response()->noContent();
    }

    public function restart(UnitInterface $unit): Response
    {
        dispatch(new UnitRestartJob($unit));
        return response()->noContent();
    }

    public function nextCase(MultiWanRouter $unit): Response
    {
        dispatch(new UnitSwitchJob($unit));
        return response()->noContent();
    }
}
