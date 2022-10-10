<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;

class EventsController extends BaseController
{
    public function getWarmupEvents() {
        $events=Event::all();
        return response()->json($events);
    }

    public function getEventsWithWorkshops() {
        $events=Event::with(['workshop'])->get();
        return response()->json($events);
    }

    public function getFutureEventsWithWorkshops() {
      $events=Event::with(['workshop'])->whereHas('workshop',function($q){
        return $q->whereDate('start','>=',date('Y-m-d'));
      })->get();
      return response()->json($events);
    }
}
