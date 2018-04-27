@extends('layouts.app')

@section('content')
<div class = "container">
<h2> {{ $event->name }}</h2>
<table class = "table">
    <thead>
    <tr>
        <th> Lane </th>
        <th> Name </th>
        <th> Age </th>
        <th> School </th>
        <th> Seed Time </th>
        <th> Time </th>
        <th> Position </th>
    </tr>
 </thead>
 
 </table>
</div>
                                 
@endsection
