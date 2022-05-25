@extends('layouts.dashapp')

@section('title', 'DashBoard')

@section('content')



<div class="card mx-auto w-100">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Event List</h2>
        <a href="dashboard/events/create" class="btn btn-info btn-md mx-1"><i class="bi bi-plus"></i> Add Event</a>
    </div>
    <div class="table-responsive">
        @if (count($events)>0)
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th> Event Date</th>
        <th> Photo </th>
        <th> Actions </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($events as $event )
<tr>
    <td>{{$event->id}}</td>
    <td>{{$event->title}}</td>
    
    <td>{{Str::limit($event->content, 100, '...')}}</td>
    <td>{{$event->event_date}}</td>
    <td><img src="{{$event->photo}}" width="150px" alt="{{$event->title}}"></td>
    <td> 
        <a href="" class="btn btn-success btn-sm mx-1"><i class="bi bi-pencil"></i></a>
        <a href="" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></a>
    </td>
  </tr>
@endforeach
      
    </tbody>
    
  </table>
    
@endif
    <div class="card-footer d-flex flex-nowrap justify-content-end">
        {{$events->links() }}
    </div>
    </div>
</div>


@endsection