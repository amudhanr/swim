@extends('layout.app')
 
  <form method="post" action="/admin/hosts">
  
    <input type="text" name="name" placeholder="Enter name">
    
    <input type="text" name="address" placeholder="Enter address">
    
    <input type="submit" name="submit">
    
  </form>

@section('content')
