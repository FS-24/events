@extends('layouts.app')

@section('title','Home')


@section('content')

  
@if (count($events)>0)
    <div class="row my-3 w-50 mx-auto">
        <div class="col">
            <form action="" method="get">
                <div class="input-group">
                    <input type="search" value="" name="search" placeholder="Search" class="form-control">
                    <button class="btn btn-info">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row ">

    @foreach ($events as $event)
    <div class="col-3 my-1">
    <div class="card" style="width: 18rem">
        <img src="{{ asset($event->photo)}}" width="100%" height="200px" alt="{{$event->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$event->title}}</h5>
          <p class="card-text">{{$event->content}}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endif
    
@endsection


{{-- @for($j = $i ; $j<count($events); $j++ )
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($events[$j]->photo)}}" width="150px" alt="{{$events[$j]->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$events[$j]->title}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @php
            if($j %3 ==0){
                continue;
            }
        @endphp
        @endfor
    --}}