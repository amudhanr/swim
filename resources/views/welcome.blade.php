@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		    	
    </div>
    <div class="row">
    	<div class="col-sm-6" style="background-color:lavender;">	
        	<h2 class ="text-center"> Ranking </h2>
            
         </div>
        <div class="col-sm-6" style="background-color:lavender;">
       		<h2 class ="text-center"> Video </h2>
            <iframe width="450" height="340" src ="https://www.youtube.com/watch?v=lMM61mH0dJo" frameborder="0">
        </div>
     </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
