@extends('layouts.app')

@section('content')
<div class="container">
  <form method="post" action="/admin/hosts">
 {{ csrf_field() }}
 <div class="form-group">
	<label for="name">Enter Name</label>	
    <input type="text" name="name" placeholder="Enter name">
 </div>
 <div class="form-group">
	<label for="slug">Enter Unique Identifier for the Meet</label>
    <input type="text" name="address" placeholder="Enter address">
 </div>
 <div class="form-group">
    <input type="submit" name="submit">
 </div>
  </form>
</div>

@endsection
