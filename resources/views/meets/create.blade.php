@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(array('url' => '/admin/meets/','class' => '')); !!} 
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Enter Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" required autofocus />
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            <label for="slug">Enter Unique Identifier for the Meet</label>
            <input type="text" name="slug" id="slug" placeholder="Unique identifier for the meet" class="form-control" value="{{ old('slug') }}" required />
            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date"> Enter Start Date for the Meet</label>
            <input type="text" name="start_date" id="start_date" placeholder="Start Date for the Meet" class="form-control" value="{{ old('start_date') }}" />
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
            <label for="end_date"> Enter End Date for the Meet</label>
            <input type="text" name="end_date" id="end_date" placeholder="End Date for the Meet" class="form-control" value="{{ old('end_date') }}" />
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="hosts">Host Location</label>
	    {!! Form::select("hosts", $hosts, null, array('class' => 'form-control')) !!}
        </div>
      <div class="form-group">
          {!! Form::submit('Add Meet', array('class' => 'btn btn-primary')); !!}
      </div>
    {!! Form::close(); !!}
  </div>
</div>
@endsection

