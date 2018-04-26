<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Days;
use App\Events;
use App\Heats;
use App\Lanes;
use App\Meets;

class EventsController extends Controller
{

    public function index($meet_id) {
        $days = Meets::find($meet_id)->days;
        $meet = Meets::find($meet_id)->first();
        $events = $daysData = array();
        foreach ($days as $day) {
            $events[$day->date][] = Days::find($day->id)->events;
            $daysData[$day->date] = $day;
        }
	return view('events.index', ['events' => $events, 'days' => $daysData, 'meet' => $meet]);
    }

    public function event($event_id) {
        $event = Events::find($event_id)->first();
        $heats = Events::find($event_id)->heats;
        $lanes = array();
        foreach ($heats as $heat) {
            $lanes_temp = Heats::find($heat->id)->lanes;
            $lanes[$heat->name] = $lanes_temp;
        }
	return view('events.event', ['event' => $event, 'lanes' => $lanes]);
    }

}
