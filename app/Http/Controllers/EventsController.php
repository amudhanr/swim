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
        $days_id = array();
        foreach ($days as $day) {
            var_dump($day->id);
            $days_id[] = $day->id;
        }
        $events = Days::find(1)->events;
        var_dump($events);
        die("asdfadsf");
    }
}
