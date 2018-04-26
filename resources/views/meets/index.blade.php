@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meets</h1>
    @foreach ($meets as $meet)
    <div class="row">
        <div class="col-xs-8 col-md-6">
        <p>{{Html::linkAction('MeetsController@edit', $meet->name, array($meet->id))}}</p>
        </div>
        <div class="col-xs-4 col-md-6">
        {{ $meet->start_date }} to {{ $meet->end_date }}
        </div>
    </div>
    @endforeach
</div>
@endsection
