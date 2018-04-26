@extends('layout.app')
 
  <form method="POST" action="/admin/hosts">
    {{ csrf_field() }} 
    <input type="text" name="name" placeholder="Enter name">
    
    <input type="text" name="address" placeholder="Enter address">
    
    <input type="submit" name="submit">
    
  </form>

@section('content')
