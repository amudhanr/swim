@extends('layouts.app')

@section('content')

  <form method="post" action="/admin/teams">
 {{ csrf_field() }}
 
    <input type="text" name="name" placeholder="Enter name">
    
    <input type="text" name="shortName" placeholder="Enter shortName">
    
    <input type="submit" name="submit">
    
  </form>

@endsection
