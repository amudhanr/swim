@extends('layout.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="/admin/days/create">
    
      <input type="text" name="name" placeholder="Enter name">
      
      <input type="text" name="address" placeholder="Enter address">
    // have not changed the information yet; 
      <input type="submit" name="submit">
      
    </form>
  </div>
</div>
@endsection
