@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="post" action="/admin/meets/create">
    
      <input type="text" name="name" placeholder="Enter name">
      </br>
      <input type="text" name="address" placeholder="Enter address">
      
      <input type="text" name="slug" placeholder="unique identifier for the meet">
      
      <input type="text" name="start_date" placeholder="Start Date for the Meet">
      
      <input type="text" name="end_date" placeholder="End Date for the Meet">
      
      <select name="hosts_id">
          <option value="##">Hosts Name</option>
          //FIXME: The above options should be generated using a for loop based on the values stored in the hosts table
      </select>
      
      <input type="submit" name="submit">
      
      
    </form>
  </div>
</div>
@endsection

