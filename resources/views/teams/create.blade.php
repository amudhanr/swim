@extends('layouts.app')

@section('content')

  <form method="post" action="/admin/teams">
 {{ csrf_field() }}
 
    <input type="text" name="name" placeholder="Enter name">
    
    <input type="text" name="short_name" placeholder="Enter shortName">
    
    <input type="text" name="address" placeholder="Enter address">
    
    <input type="text" name="contact_person" placeholder="Enter contactPerson">
        
    <input type="text" name="contact_email" placeholder="Enter contactEmail">
            
    <input type="text" name="contact_phone" placeholder="Enter contactPhone">
    
    <input type="text" name="slug" placeholder="Enter slug">
    
    <input type="submit" name="submit">
    
  </form>

@endsection
