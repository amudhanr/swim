@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h1 class="text-center"> BAIS Swim! </h1>
        <p class="text-center"> Most Recent Activity:</p>
        <p class="text-center">  IISSAC Day 1  </p> <p class="text-center"> Date: March 1, 2017 </p>
    </div>
    
    <div class="row">
    	<div class="col-sm-6" style="background-color:lavender;">	
        	<h2 class ="text-center"> Ranking </h2>
            
         </div>
        <div class="col-sm-6" style="background-color:lavender;">
       		<h2 class ="text-center"> Video </h2>
            
            <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src ="https://www.youtube.com/watch?v=lMM61mH0dJo" frameborder="0"></iframe>
            </div>
        </div>
     </div>
   
</div>
@endsection
