@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/admin/meets/create">
<<<<<<< HEAD
        <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="address">Enter Address</label>
            <input type="text" name="address" id="address" placeholder="Enter address" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Enter Unique Identifier for the Meet</label>
            <input type="text" name="slug" id="slug" placeholder="Unique identifier for the meet" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date"> Enter Start Date for the Meet</label>
            <input type="text" name="start_date" id="start_date" placeholder="Start Date for the Meet" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date"> Enter End Date for the Meet</label>
            <input type="text" name="end_date" id="end_date" placeholder="End Date for the Meet" class="form-control">
        </div>
=======
    
      <input type="text" name="name" placeholder="Enter name">
      </br>
      <input type="text" name="address" placeholder="Enter address">
      
      <input type="text" name="slug" placeholder="unique identifier for the meet">
      
      <input type="text" name="start_date" placeholder="Start Date for the Meet">
      
      <input type="text" name="end_date" placeholder="End Date for the Meet">
      
>>>>>>> 253c7d771f8656ab97c7f4fb8b597b052953f955
      <select name="hosts_id">
          <option value="##">Hosts Name</option>
          //FIXME: The above options should be generated using a for loop based on the values stored in the hosts table
      </select>
      <div class="form-group">
      <input type="submit" name="submit"> 
      </div>
      
    </form>
  </div>
</div>
@endsection

