@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(array('url' => '/admin/hosts','class' => '')); !!} 
     <div class="form-group">
        <label for="name">Enter Name</label>	
        <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
     </div>
     <div class="form-group">
        <label for="address">Address</label>
        {!! Form::text("address", null, array('placeholder' => 'Enter the complete Host address', 'class' => 'form-control')); !!} 
     </div>
     <div class="form-group">
        {!! Form::submit('Add Host', array('class' => 'btn btn-primary')); !!}
     </div>
    {!! Form::close(); !!}
</div>

@endsection
