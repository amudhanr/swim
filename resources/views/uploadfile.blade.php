@extends('layouts.app')

@section('content')
<script>
$(".meets").change(function(){
    var str ="";
        $("select option:selected").each (function() {
            str += $(this).text() + " ";
        });
        $("dic").text(str);
    ])
    .change();



</script>
<div class="container">
    <div class="panel panel-warning">
        <div class="panel-heading"><h3 class="panel-title">Athletes Data Upload</h3></div>
        <div class="panel-body">
            {!! Form::open(array('url' => '/uploadfile','files'=>'true','class' => '')); !!} 
            {!! Form::text("filetype", "athletes", array('hidden' => 'hidden')); !!} 
            <div class="form-group">
                <label for="meets">Meet Name:</label>
                {!! Form::select('meets', $meets, null, array('class' => "form-control meets", 'selected' => "selected")); !!}
            </div> 
            <div id="day"><b>No meet is selected...</b></div>
            
            <div class="input-group">
              <div class="custom-file">
                <label class="custom-file-label" for="file">Upload the Athletes file</label>
                {!! Form::file('file', array('class' => 'form-control')); !!}
              </div>
            </div>
            <div class="form-group">
                <br />
                {!! Form::submit('Upload &amp; Process File', array('class' => 'btn btn-primary')); !!}
            </div>
            {!! Form::close(); !!}
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Meet Program Upload</h3></div>
        <div class="panel-body">
            {!! Form::open(array('url' => '/uploadfile','files'=>'true')); !!} 
            {!! Form::text("filetype", "meet-program", array('hidden' => 'hidden')); !!} 
            <div class="form-group">
                <label for="meets">Meet Name:</label>
                {!! Form::select('meets', $meets, null, array('class' => "form-control")); !!}
            </div> 
            <div class="input-group">
              <div class="custom-file">
                <label class="custom-file-label" for="file">Upload the Meet Program file</label>
                {!! Form::file('file', array('class' => 'form-control')); !!}
              </div>
            </div>
            <div class="form-group">
                <br />
                {!! Form::submit('Upload &amp; Process File', array('class' => 'btn btn-primary')); !!}
            </div>
            {!! Form::close(); !!}
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading"><h3 class="panel-title">Meet Results Upload</h3></div>
        <div class="panel-body">
            {!! Form::open(array('url' => '/uploadfile','files'=>'true')); !!} 
            {!! Form::text("filetype", "meet-results", array('hidden' => 'hidden')); !!} 
            <div class="form-group">
                <label for="meets">Meet Name:</label>
                {!! Form::select('meets', $meets, null, array('class' => "form-control")); !!}
            </div> 
            <div class="input-group">
              <div class="custom-file">
                <label class="custom-file-label" for="file">Upload the Meet Results file</label>
                {!! Form::file('file', array('class' => 'form-control')); !!}
              </div>
            </div>
            <div class="form-group">
                <br />
                {!! Form::submit('Upload &amp; Process File', array('class' => 'btn btn-primary')); !!}
            </div>
            {!! Form::close(); !!}
        </div>
    </div>
</div>
@endsection
