@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(array('url' => '/admin/hosts','class' => '')); !!} 
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
       <label for="name">Enter Name</label>	
       {!! Form::text("name", old('name'), array('placeholder' => 'Enter the name of the Host location', 'class' => 'form-control', 'required'=>'required')); !!} 
       @if ($errors->has('name'))
           <span class="help-block">
               <strong>{{ $errors->first('name') }}</strong>
           </span>
       @endif
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
       <label for="address">Address</label>
       {!! Form::text("address", old('address'), array('placeholder' => 'Enter the complete Host address', 'class' => 'form-control')); !!} 
    </div>
    <div class="form-group">
       {!! Form::submit('Add Host', array('class' => 'btn btn-primary')); !!}
    </div>
    {!! Form::close(); !!}
</div>

@endsection
