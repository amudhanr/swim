@extends('layout.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="/admin/meets/create">
    
      <input type="text" name="name" placeholder="Enter name">
      
      <input type="text" name="address" placeholder="Enter address">
      
      <input type="submit" name="submit">
      
    </form>
  </div>
</div>
@endsection

