@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  {!! Form::open(array('url' => '/admin/days/','class' => 'form-horizontal')); !!} 
    <div class="form-group">
	<label for="name"> Name</label>
	<input type="text" name="name" id="name" placeholder="Insert Name" class="form-control">
    </div>
    <div class="form-group">
        <label for="meets_id">Meet Name:</label>
        {!! Form::select('meets_id', $meets, null, array('class' => "form-control meets", 'selected' => "selected")); !!}
    </div>
    <div class="form-group">
	<label for="youtube_link"> Enter Youtube Link</label> 
	<input type="text" name="youtube_link" id="youtube_link" placeholder="Enter YouTube Link" class="form-control">
    </div>
    <div class="form-group">
	<label for="date"> Enter Date</label>
     	<input type="text" name="date" id="date" placeholder="Enter date" class="form-control">
    </div>
    <div class="form-group"> 
        {!! Form::submit('Add Day', array('placeholder' => 'btn btn-primary')); !!} 
    </div>
    {!! Form::close(); !!} 
  </div>
</div>   
@endsection
