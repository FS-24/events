@extends('layouts.dashapp')

@section('title','Event List')


@section('content')

<div class="card  w-100 h-100">
  
@if (count($events)>0)

    @for ($i = 0; i<$events->length; $i=i+3)
    <div class="row">
        @for($j = i ; $j<$events.lenght; $j++ )
            
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($events[$j]->photo)}}" width="150px" alt="{{$event->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$events[$j]->title}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endfor
    </div>
        
    @endfor
@endif
    
@endsection

