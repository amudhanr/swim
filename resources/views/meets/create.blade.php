@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/admin/meets/create">
        <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="address">Enter Address</label>
            <input type="text" name="address" id="address" placeholder="Enter address" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Enter Unique Identifier for the Meet</label>
            <input type="text" name="slug" id="slug" placeholder="Unique identifier for the meet" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date"> Enter Start Date for the Meet</label>
            <input type="text" name="start_date" id="start_date" placeholder="Start Date for the Meet" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date"> Enter End Date for the Meet</label>
            <input type="text" name="end_date" id="end_date" placeholder="End Date for the Meet" class="form-control">
        </div>
        <div class="form-group">
            <label for="hosts">Host Location</label>
	    {!! Form::select('hosts', $hosts, null, array('class' => "form-control")) !!}
        </div>
      <div class="form-group">
      <input type="submit" name="submit"> 
      </div>
      
    </form>
  </div>
</div>
@endsection

