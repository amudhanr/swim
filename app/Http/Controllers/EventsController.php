<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Days;
use App\Events;
use App\Heats;
use App\Lanes;
use App\Meets;
use DB;

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
	return view('meets.index', ['events' => $events, 'days' => $daysData, 'meet' => $meet]);
    }

    public function event($event_id) {
        $event = Events::find($event_id)->first();
        $heats = Events::find($event_id)->heats;
        $lanes = array();
		$swimmers = DB::table('heats')
			->join('lanes', 'heats.id', '=', 'lanes.heats_id')
			->join('swimmers', 'lanes.swimmers_id', '=', 'swimmers.id')
			->join('teams', 'swimmers.team_id', '=', 'teams.id')
			->select('swimmers.*', 'lanes.*', 'heats.name as heats_name', 'teams.short_name')
			->where('heats.events_id', '=', $event->id)
			->orderBy('heats_name', 'lanes.position', 'lanes.lane_number')
			->get();
		var_dump($swimmers);
		die('here');
        foreach ($heats as $heat) {
            $lanes_temp = Heats::find($heat->id)->lanes;
            $lanes[$heat->name] = $lanes_temp;
        }
	return view('events.event', ['event' => $event, 'lanes' => $lanes, 'heats' => $heats]);
    }

}
