@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="/admin/days/create">
    
      <input type="text" name="youtube_link" placeholder="Enter YouTube Link">
      
      <input type="text" name="slug" placeholder="Enter slug">

      <input type="text" name="date" placeholder="Enter date">
      
    </form>
  </div>
</div>
@endsection
