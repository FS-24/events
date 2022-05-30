@extends('layouts.dashapp')

@section('title','DashBoard')


@section('content')

<div class="card  w-100 h-100">
    @if (session('status'))
    <x-alert type="success" :message="session('status')"/>
    @endif
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Event List</h2>
        <a href="{{route('event.create')}}" class="btn btn-info btn-md mx-1"><i class="bi bi-plus"></i> Add Event</a>
    </div>
    <div class="table-responsive">
@if (count($events)>0)
<table class="table table-bordered text-center">
    <thead>
      <tr>
        <th width="2%" >#</th>
        <th width="20%" >Title</th>
        <th width="30%">Description</th>
        <th width="10%"> Event Date</th>
        <th width="10%"> Photo </th>
        <th width="10%"> Actions </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($events as $event )
<tr>
    <td>{{$event->id}}</td>
    <td>{{$event->title}}</td>
    
    <td>{{Str::limit($event->content, 100, '...')}}</td>
    <td>{{$event->event_date}}</td>
    <td><img src="{{ asset($event->photo)}}" width="150px" alt="{{$event->title}}"></td>
    <td> 
        <a href="{{route('event.edit',['id'=>$event->id])}}" title="Update" class="btn btn-success btn-sm mx-1"><i class="bi bi-pencil"></i></a>
          {{-- <button type="submit" class="btn btn-danger">Yes</button> --}}
        <a href="{{route('event.delete',['id'=>$event->id])}}" title="Delete" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></a>

      
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

