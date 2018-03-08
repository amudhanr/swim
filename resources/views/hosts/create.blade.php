@extends('layouts.app')

@section('content')

  <form method="post" action="/admin/hosts">
 {{ csrf_field() }}
 
    <input type="text" name="name" placeholder="Enter name">
    
    <input type="text" name="address" placeholder="Enter address">
    
    <input type="submit" name="submit">
    
  </form>

@endsection
