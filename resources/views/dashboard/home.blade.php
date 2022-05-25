@extends('layouts.dashapp')

@section('title', 'DashBoard')

@section('content')



<div class="card mx-auto w-100">
    @if (session('status'))
    <x-alert type="success" :message="session('status')"/>
    @endif
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Event List</h2>
        <a href="/dashboard/events/create" class="btn btn-info btn-md mx-1"><i class="bi bi-plus"></i> Add Event</a>
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
        <form action="/dashboard/events/{{$event->id}}" method="POST">
          @csrf
          @method('delete')
          {{-- <button type="submit" class="btn btn-danger">Yes</button> --}}
        <button  class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></button>

        </form>
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


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel"> Deletion Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this item???
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
        <form action="/dashboard/events/{{$event->id}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Yes</button>
        </form>
       
      </div>
    </div>
  </div>
</div>