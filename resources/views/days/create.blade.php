@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  {!! Form::open(array('url' => '/admin/days/','class' => 'form-horizontal')); !!} 
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name"> Name</label>
	<input type="text" name="name" id="name" placeholder="Insert Name" class="form-control" value="{{ old('name') }}" required autofocus />
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('meets_id') ? ' has-error' : '' }}">
        <label for="meets_id">Meet Name:</label>
        {!! Form::select('meets_id', $meets, null, array('class' => "form-control meets", 'selected' => "selected")); !!}
        @if ($errors->has('meets_id'))
            <span class="help-block">
                <strong>{{ $errors->first('meets_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('youtube_link') ? ' has-error' : '' }}">
	<label for="youtube_link"> Enter Youtube Link</label> 
	<input type="text" name="youtube_link" id="youtube_link" placeholder="Enter YouTube Link" class="form-control" value="{{ old('youtube_link') }}">
        @if ($errors->has('youtube_link'))
            <span class="help-block">
                <strong>{{ $errors->first('youtube_link') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
	<label for="date"> Enter Date</label>
     	<input type="text" name="date" id="date" placeholder="Enter date" class="form-control" value="{{ old('date') }}">
        @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group"> 
        {!! Form::submit('Add Day', array('placeholder' => 'btn btn-primary')); !!} 
    </div>
    {!! Form::close(); !!} 
  </div>
</div>   
@endsection
