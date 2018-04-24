<?php
use App\Exceptions\Handlers; 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Excel;
use App\Meets;

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
                    $this->processMeetProgramFile($newFilePath);
                break;
                case 'meet-result':
                break;
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage(); 
            die ($errorMessage);
           //FIXME: pass the above error message to the view and display it on the view 
        }
        die();
    }
    public function processMeetProgramFile($file) {
        //check if the file exists
        if (!file_exists($file)) {
            throw new Exception("$file does not exist!");
	    die ();
        	}

        //check to see if the columns match what you are looking for
	$rows = Excel::load($file)->get();
        
        echo "<pre>";
        $count = 0;
        $swimmers_id = $days_id = $heats_id = $events_id = $teams_id = $days_id = null;
	foreach ($rows as $row) {
            $count++;
            $data = array();
            if (empty($row)) { continue; }
            
            foreach ($row as $col) {
                //skip empty columns
                if (empty($col)) { continue; }
                $data[] = $col;
            }
            if (!empty($data)) {
                if (stripos($data[0], "event") !== false) {
                    // This is an event heading row
                }
                var_dump($data);
                echo "<hr />";
                //first time you read the array with 7 element, it is your column header
            }
	}
        echo "</pre>";
        //loop through each line of the file and extract data into an ac function postUploadCsv()
   
	
            // check for duplicate entry, if duplicate then update the existing record
            

        // q
            // if not duplicate the insert into the approprate tables

    } 
    public function processAthleteFile($file) {
        if (!file_exists($file)) {
        throw new Exception("$file does not exist!");
        die();
        }

        $rows = Excel::load($file)->get();
        echo "<pre>";
        $count = 0;
        $swimmer_id = $name_id = $sex_id = $age_id = $birth_id = null;
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
                 
            
            if (count($data) == 1) {
                //this is a team name
            
                //search the team in the database
                if (/*team not found) {
                    //make new team
                }
                $teams_id = $data[1]
            }

            if ($data[0] == 0){}

                 */

            }
            echo "<hr />";
	}
        echo "</pre>";
    }

}
