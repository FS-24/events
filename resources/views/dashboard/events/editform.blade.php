@extends("layouts.dashapp")

@section('title', 'Edit Event')
@section('content')
    <div class="card my-3 mx-auto shadow">
        
        @if (session('status'))
        <x-alert type="success" :message="session('status')"/>
        @endif
        <div class="card-header  text-center">
            <h1>Edit Event</h1>
        </div>
        <div class="card-body">
            <form action="{{route('event.update', ['id'=>$event->id])}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <input type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$event->id}}" id="name"/>
                <div class="form-group m-2">
                    <label for="name" class="form-label">Event Name</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$event->title}}" id="name"/>
                    
                    @error('title')
                    <x-alert type="danger" :message=$message/>
                    @enderror
                </div>
                
                <div class="form-group m-2">
                    <label for="desc"class="form-label">Event Description</label>
                    <textarea class="form-control" placeholder="Give us a little description." name="content" id="desc">{{$event->content}}</textarea>
                </div> 
                
                <div class="form-group m-2">
                    <label for="date" class="form-label">Event Date</label>
                    <input type="date" name="event_date" id="date" class="form-control @error('event_date') is-invalid @enderror" value="{{$event->event_date}}">
                    @error('event_date')
                    <x-alert type="danger" :message=$message/>
                @enderror
                </div>   
                
                <div class="form-group m-2">
                    <label for="pic" class="form-label">Upload picture</label>
                    <input type="file" name="photo" id="pic" class="form-control @error('photo') is-invalid @enderror" value="{{$event->photo}}">
                    @error('photo')
                    <x-alert type="danger" :message=$message/>
                @enderror
                </div>
                <input type="reset" value="Reset" class="btn btn-warning btn-md float-end m-2"/>
                <button class="btn btn-primary btn-md float-end m-2"> <i class="bi bi-plus"></i> Save</button>
                 
            </form>
        </div>
    </div>
    
@endsection

