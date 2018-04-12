<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Meets;
use App\Days;

class EventsController extends Controller
{

    public function index($meet_id) {
        $days = Meets::find($meet_id)->days;
        $events = $daysData = array();
        foreach ($days as $day) {
            $events[$day->date][] = Days::find($day->id)->events;
            $daysData[$day->date] = $day;
        }
	return view('meets.index', ['events' => $events, 'days' => $daysData]);
        //FIXME: need to edit the above foreach loop to group the events by day
    }

    public function event($event_id) {
        $days = Meets::find($meet_id)->days;
        $events = $daysData = array();
        foreach ($days as $day) {
            $events[$day->date][] = Days::find($day->id)->events;
            $daysData[$day->date] = $day;
        }
	return view('meets.index', ['events' => $events, 'days' => $daysData]);
        //FIXME: need to edit the above foreach loop to group the events by day
    }
}
