@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class ="text-center">MAIN EVENT</h1>
    @foreach ($events as $day=>$eventData)
    <div class="row">
        <h4>DAY: {{ $day }}</h4>
        <div class="col-xs-8 col-md-6" style="background-color:lavenderblush;">
        @foreach ($eventData as $eventArray)
            @foreach ($eventArray as $event)
        <p>{{Html::linkAction('EventsController@event', $event->name, array($event->id))}}</p>
            @endforeach
        @endforeach    
        </div>
        <div class="col-xs-4 col-md-6" style="background-color:lavender;">
        @php $dayInfo = $days[$day]; @endphp
            <iframe width="340" height="340" src ="{{ $dayInfo->youtube_link }}" frameborder="0"></iframe>
        </div>
    </div>
    @endforeach
</div>
@endsection
