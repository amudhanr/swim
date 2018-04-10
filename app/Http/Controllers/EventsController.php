<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Meets;
use App\Days;

class EventsController extends Controller
{

    public function index($meet_id) {
        $days = Meets::find($meet_id)->days;
        $events = array();
        $data = array();
        foreach ($days as $day) {
            var_dump($day->id);
            $data[$day->date][] = Days::find($day->id)->events;
        }
        var_dump($data);
	return view('meets.index', ['data' => $data]);
        //FIXME: need to edit the above foreach loop to group the events by day
    }
}
