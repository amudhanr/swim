
@extends('layouts.app')


      
@section('content')
         // echo Form::open(array('url' => '/uploadfile','files'=>'true'));
        // echo 'Select the file to upload.';
         //echo Form::file('image');
        // echo Form::submit('Upload File');
        // echo Form::close();

      
      {!!Form::open(array('url' => '/uploadfile','files'=>'true'))!!}
      {!!form::label('fileupload', 'File Upload:')!!}
      <input id="input-1" type="file" class="file" name="filefield">
@endsection
