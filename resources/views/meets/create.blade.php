@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

    {!! Form::open(array('url' => '/admin/meets/','class' => '')); !!} 
        <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" />
        </div>
        <div class="form-group">
            <label for="slug">Enter Unique Identifier for the Meet</label>
            <input type="text" name="slug" id="slug" placeholder="Unique identifier for the meet" class="form-control" value="{{ old('slug') }}" />
        </div>
        <div class="form-group">
            <label for="start_date"> Enter Start Date for the Meet</label>
            <input type="text" name="start_date" id="start_date" placeholder="Start Date for the Meet" class="form-control" value="{{ old('start_date') }}" />
        </div>
        <div class="form-group">
            <label for="end_date"> Enter End Date for the Meet</label>
            <input type="text" name="end_date" id="end_date" placeholder="End Date for the Meet" class="form-control" value="{{ old('end_date') }}" />
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

