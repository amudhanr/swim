@extends('layout.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="/admin/days/create">
    
      <input type="text" name="lane_number" placeholder="Enter Lane Number.">
      
      <input type="text" name="seed_time" placeholder="Enter seed time.">

      <input type="text" name="time" placeholder="Enter time">
      
      <input type="text" name="position" placeholder="Enter position">
      
      <input type="text" name="points" placeholder="Enter points">
      
      <input type="text" name="created_at" placeholder="Enter create time.">
      
      <input type="text" name="updated_at" placeholder="Enter update time.">
      
      
    </form>
  </div>
</div>
@endsection
