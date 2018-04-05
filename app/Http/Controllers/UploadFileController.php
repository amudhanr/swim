<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
          
        $file->move($destinationPath,$file->getClientOriginalName());

        try {
            $this->processUploadedFile($file);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage(); 
           //FIXME: pass the above error message to the view and display it on the view 
        }
    }
    
    public function processUploadedFile($file) {
        //check if the file exists
        if (!file_exists($file)) {
            throw new Exception("$file does not exist!");
        }
        //check to see if the columns match what you are looking for
        
        //loop through each line of the file and extract data into an array
        
            // check for duplicate entry, if duplicate then update the existing record
            
            // if not duplicate the insert into the approprate tables
    }
}
?>
