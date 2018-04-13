<?php
use App\Exceptions\Handlers; 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Excel;

class UploadFileController extends Controller {
    public function index(){
       return view('uploadfile');
    }
    public function showUploadFile(Request $request){
        $file = $request->file('image');
        
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
            $this->processUploadedFile($newFilePath);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage(); 
            die ($errorMessage);
           //FIXME: pass the above error message to the view and display it on the view 
        }
    }
    
    public function processUploadedFile($file) {
        //check if the file exists
        if (!file_exists($file)) {
<<<<<<< HEAD
            throw new Exception("$file does not exist!");
	    die ();
        	}

        //check to see if the columns match what you are looking for
	$rows = Excel::load($file)->get();
	var_dump($rows); die('asdfads');
        //loop through each line of the file and extract data into an ac function postUploadCsv()
   

	
=======
            throw new \Exception("$file does not exist!");
        }
        //check to see if the columns match what you are looking for
        
        //loop through each line of the file and extract data into an array
        $handle = fopen($file, "r");
	while(!feof($handle)) {
            $data = fgetcsv($handle);
            var_dump($data);
        }	
	// connect to your db, not included:
        // or since you said name & id
	 
>>>>>>> 3660be5b5ad2ac0769ba6d1d9d8f09fdacc00ce8
            // check for duplicate entry, if duplicate then update the existing record
            

            // if not duplicate the insert into the approprate tables

	}
}
