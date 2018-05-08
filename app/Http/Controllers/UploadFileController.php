<?php
use App\Exceptions\Handlers; 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Excel;
use App\Meets;
use App\Swimmers;
use App\Teams;
use App\Days;
use App\Events;

class UploadFileController extends Controller {
    public function index(){
	$meets = Meets::pluck('name','id');
        return view('uploadfile', ['meets' => $meets]);
    }
    public function showUploadFile(Request $request){
        $file = $request->file('file');
        
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
        
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
        
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
        
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
        
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
        
        //Move Uploaded File
        $destinationPath = storage_path('app');
          
	$newFilePath = $destinationPath . "/" . $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
	echo '<p>File Real Path, after Move: ' . $newFilePath . '</p>';

        try {
            switch($request->filetype) {
                case 'athletes':
                    $this->processAthleteFile($newFilePath); 
                break;
                case 'meet-program':
                    $this->processMeetProgramFile($newFilePath, $request->meets);
                break;
                case 'meet-results':
                    echo "tis";
                    $this->processMeetResults($newFilePath);
                break;
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage(); 
            die ($errorMessage);
           //FIXME: pass the above error message to the view and display it on the view 
        }
        die();
    }
    public function processMeetProgramFile($file, $meet_id) {
        echo "kwdkwdknda";
        //check if the file exists
        if (!file_exists($file)) {
            throw new Exception("$file does not exist!");
	    die ();
        }

        //check to see if the columns match what you are looking for
	$rows = Excel::load($file)->get();
        echo "<pre>";
        $count = 0;
        $relay = $swimmers_id = $days_id = $heats_id = $events_id = $teams_id = $days_id = null;
	foreach ($rows as $row) {
            $count++;

            $data = array();
            if (empty($row)) { continue; }
            
            echo "line " . $count . "</br>";
            
            
            foreach ($row as $col) {
                //skip empty columns
                if (empty($col)) { continue; }
                $data[] = $col;
            }

            if ($count == 3) {
                $nameData = (explode(" ", $data[0]));
                $name = $nameData[3] . " " . $nameData[4];
                echo "this is days " . $name . "</br>";
                $day = Days::where('name', $name)->where('meets_id', $meet_id)->first();
                if (sizeof($day) == 0) {
                    $day = new Days;
                    $day->name = $name;
                    $day->meets_id = $meet_id;
                    $day->date = null;
                    $day->slug = substr(strtolower(str_replace(' ', '', $name)), 49);
                    $day->youtube_link = null;
                    $day->save();
                    echo "Days " . $name . " is created</br>";
                } 
                $days_id = $day->id;
                echo "Days id is " . $days_id;
            } 

            if (!empty($data)) {
                if (stripos($data[0], "event") !== false) {
                    // This is an event heading row
                    if (stripos($data[0], "Boys") !== false) {
                        $gender = 'M';
                    } else {
                        $gender = 'F';
                    } 
                    
                    $event = Events::where('name', $data[0])->first();
                    if (sizeof($event) == 0) {
                        $event = new Events;
                        $event->name = $data[0];
                        $event->gender = $gender;
                        $event->days_id = $days_id;
                        $event->slug = substr(strtolower(str_replace(' ', '', $data[0])), 49);
                        $event->save();
                        echo "Event " . $data[0] . " has been created.";
                    }
                        if (stripos($data[0], "Relay") !== false) {
                            echo "this is a relay event </br>";
                            $relay = true;
                        }
                        
                        else {
                            echo "this is an non -relay event </br>";
                            $relay = false;
                        }

                    $event_id = $event->id;
                    $event_name = $event->name;

                }
                
                elseif(($count > 8 ) && (sizeof($data) == 1) && (stripos($data[0], "Heat") !== false)) {
                    
                    echo "this is a heat data</br>";

                    $heat_name = preg_replace('/\s+/', ' ', $data[0]);
                    $heatData = explode(" ", $heat_name);
                    $heat_name = $event_name . " " . $heatData;
                    $heat = Heats::where("name", $heat_name)->first();

                    if ($sizeof($heat) == 0) {

                        $heat = new Heats;
                        $heat->name = $heat_name;
                        $heat->events_id = $event_id;
                        //$heat->slug = substr(strtolower(str_replace(' ', '', $heat_name)), 49);
                        $heat->save();
                        echo "Heat " . $heat_name . " created. </br>";
               
                    }

                    $heat_id = $heat->id;
                    echo "Heat id is " . $heat_id . " </br>";

                }


                elseif(($count > 8 ) && (sizeof($data) == 7) && (stripos($data[5], "_") !== false)) {
                    echo "this is a lane data</br>";
                    if($relay == false) {
                        
                        $nameData = explode(",",$data[1]);

                        $swimmer = Swimmers::where("first_name", $nameData[1])->where("age", $data[2])->where("last_name", $nameData[0])->first();

                    } elseif ($relay == true) {

                        $event_name = preg_replace('/\s+/', ' ', $event_name);
                        $eventName = explode(" ", $event_name);
                        $ageGroup = $eventName[3] . $eventName[4] . $eventName[5];
                        $name = $data[1] . " " . $ageGroup;
                        echo "assuming swimmer name as " . $name . "</br>"; 
                        $swimmer = Swimmers::where("first_name", $data[1])->where("last_name", $ageGroup)->first();

                        $team = Teams::where("name", $data[1])->first();
                        $team_id = $team->id;

                        if (sizeof($swimmer) == 0) {
                            $swimmer = new Swimmers;
                            $swimmer->first_name    = $data[1];
                            $swimmer->last_name     = $ageGroup;
                            $swimmer->gender        = $gender;
                            $swimmer->slug          = strtolower(str_replace(' ', '', $data[1]) . "-" . str_replace(' ', '', $ageGroup));
                            $swimmer->team_id       = $team_id;
                            $swimmer->save();

                        $lane = Lanes::where("lane_number", $data[0])->where("swimmer_id", $swimmer->id)->where("heat_id", $heats_id)->first;
                        
                        }
                    
                    } 
                        
                    if (sizeof($swimmer) == 0) {

                        echo "swimmer not found, please add to database</br>";
                        

                    } else {

                        echo "swimmer " . $swimmer->first_name . " identified </br>";

                    }

                }

            }
                var_dump($data);                
                echo "<hr />";
            }
	
        echo "</pre>";   
	

    } 
    public function ajax(Request $request){
    	echo $request;
    
    }

    public function processMeetResults($file) {
        if  (!file_exists($file)) {
        throw new Exception ("$file does not exist!");
    }
        $count = 1;
        $event_id = $day_id = $relay = null;
        $rows = Excel::load ($file)->get();
        echo "<pre>";
         $count = 0;  
    	foreach ($rows as $row) {
            $count++;
            $data = array();
<<<<<<< HEAD
=======
            
            if (empty($row) || $count < 5) { continue; }
            echo "Row $count" . PHP_EOL;
            if ((stripos($data[0], "event") !== false) || (stripos($data[0],'name athletes') !== false) || (stripos($data[0],'age') !== false) || (stripos($data[0],'team') !== false) || (stripos($data[0],'seed time') !== false) || (stripos($data[0],'finals time') !== false) || (stripos($data[0],'points') !== false) ) {
                    // This is an event heading row
                    $event = $data[0];
                    echo "Event Name: $event" . PHP_EOL;
            }
	    $relay = $swimmers_id = $days_id = $heats_id = $events_id = $teams_id = $days_id = null;
            foreach ($row as $col) {
                //skip empty columns
                if (empty($col)) { continue; }
                $data[] = $col;
            }
>>>>>>> 8211f845adaf960c9223637c2d176c73c2d723de
            foreach ($row as $col) {
                if (empty($col)) { continue; } 
                $data[] = $col;
            }

            if (($count > 2) && ($count == 3)) {
                echo "this is a days data</br>";
                $daysData = explode(" ",$data[0]);
                $name = $daysData[2] . " " . $daysData[3];
                $days = Days::where('name', $name)->first();
                $day_id = $days->id;
                echo "DAYS ID: " . $day_id . "</br>";

            } elseif (stripos($data[0], "Event") !== false) {

                $event = Events::where('name', $data[0])->where('days_id', $days_id)->first();

                if (sizeof($event) == 0) {
                    throw new Exception ("Run meets program file first please");     
                }

                if (stripos($data[0], "Relay") !== false) {
                    
                    echo "this is a relay event data</br>";
                    $relay = true; 
                
                } elseif (stripos($data[0], "Relay") == false) {
                    
                    echo "this is a non-relay event data</br>";
                    $relay = false;
                
                }

                $event_id = $event->id;

            } elseif (sizeof($data) == 7) {
                echo "this is a lane data</br>";
            
            }
                
            var_dump($data) . PHP_EOL;
        }
<<<<<<< HEAD
    
    }
    
=======

>>>>>>> 8211f845adaf960c9223637c2d176c73c2d723de
    public function processAthleteFile($file) {
        if (!file_exists($file)) {
            throw new Exception("$file does not exist!");
        }

        $rows = Excel::load($file)->get();
        echo "<pre>";
        $count = 0;
        $team = true;
        $swimmer_id = $first_name = $last_name = $team_name = $name = $sex_id = $age_id = $birth_id = null;
	foreach ($rows as $row) {
            $count++;
            $data = array();
            if (empty($row) || $count < 5) { continue; }
            echo "Row $count" . PHP_EOL;

            foreach ($row as $col) {
                //skip empty columns
                if (empty($col)) { continue; }
                $data[] = $col;
            }

            if (sizeof($data) == 1) {
                if ($team) {
                    $team_name = $data[0];
                    // look up team id
                    $teamData = Teams::where("name",$team_name)->first();
                    if (empty($teamData)) {
                        
                        $team = new Teams;
                        $team->name = $team_name;
                        $team->short_name = null;
                        $team->address = null;
                        $team->contact_person = null;
                        $team->contact_email = null;
                        $team->contact_phone = null;
                        $team->slug = null;
                        $team->save();
                        echo "Team " . $team_name . " is created." . PHP_EOL;
                        $team_id = $team->id;
                    } else {
                        $team_id = $teamData->id;
                    }
                }
                
                //check to see if this is Team Roster
                if ((stripos($data[0],'team roster') !== false) || (stripos($data[0],'total athletes') !== false) ) { 
                    $team = true; 
                } else { 
                    $team = false; 
                }
            } elseif ((sizeof($data) == 5) && (stripos($data[1], 'name') == false)) {
                //process the swimmer data
                //Check if the swimmer already exists, if so, then update; else insert
                $name = explode(",",$data[1]);
                $swimmer_data = array(
                    'first_name'    => $name[1],
                    'last_name'     => $name[0],
                    'gender'        => $data[2],
                    'dob'           => $data[4],
                    'age'           => $data[3],
                    'team_id'       => $team_id
                );
                $first_name = $swimmer_data['first_name'];
                $last_name = $swimmer_data['last_name'];
                $swimmer = Swimmers::where('first_name', $first_name)->where('last_name', $last_name)->get();
                if (sizeof($swimmer) == 0) { 
                    echo "Swimmer doesn't exist, let's insert ... " . PHP_EOL;
                    $this->_addSwimmer($swimmer_data);
                    echo "...succesfully imported swimmer " . $swimmer_data['first_name'] . PHP_EOL;
                }
                
            }
            echo "<hr />";
	}
        echo "</pre>";
    } 

    private function _addSwimmer($data){ 
        $swimmer = new Swimmers;
        $swimmer->first_name    = $data['first_name'];
        $swimmer->last_name     = $data['last_name'];
        $swimmer->gender        = $data['gender'];
        $swimmer->age           = $data['age'];
        $swimmer->date_of_birth = date("Y-m-d", strtotime($data['dob']));
        $swimmer->slug          = strtolower(str_replace(' ', '', $data['first_name']) . "-" . str_replace(' ', '', $data['last_name']));
        $swimmer->team_id       = $data['team_id'];
        $swimmer->save();
        return true;
    } 

}
