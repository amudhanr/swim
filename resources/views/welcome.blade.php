@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h1> BAIS Swim! </h1>
        <p> Most Recent Activity:</p>
        <p> {{ HTML::link ('/event/', 'IISSAC Day 1')}}  </p> <p> Date: March 1, 2017 </p>
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
