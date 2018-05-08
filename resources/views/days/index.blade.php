@extends('layouts.app')

@section('content')
<div class="container"> 
    <h1>Days</h1> 
    @foreach ($days as $day) 
    <div class="row"> 
        <div class="col-xs-6 cold-md-6"> 
        <p>{{Html::linkAction('DaysController@edit', $day->name, array($day->id))}}</p> 
        </div> 
        <div class="col-xs-6 cold-md-6"> 
        {{ $day->date }}
        </div> 
    </div> 
    @endforeach 
</div> 
@endsection
