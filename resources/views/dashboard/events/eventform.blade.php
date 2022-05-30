@extends("layouts.dashapp")

@section('title', 'New Event')
@section('content')
    <div class="card my-3 mx-auto w-70 shadow">
        
        @if (session('status'))
        <x-alert type="success" :message="session('status')"/>
        @endif
        <div class="card-header  text-center">
            <h1>Add Event</h1>
        </div>
        <div class="card-body">
            <form action="{{route('event.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="name" class="form-label">Event Name</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" id="name"/>
                    @error('title')
                    <x-alert type="danger" :message=$message/>
                    @enderror
                </div>
                
                <div class="form-group m-2">
                    <label for="desc"class="form-label">Event Description</label>
                    <textarea class="form-control" placeholder="Give us a little description." name="content" id="desc">{{old('content')}}</textarea>
                </div> 
                
                <div class="form-group m-2">
                    <label for="date" class="form-label">Event Date</label>
                    <input type="date" name="event_date" id="date" class="form-control @error('event_date') is-invalid @enderror" value="{{old('event_date')}}">
                    @error('event_date')
                    <x-alert type="danger" :message=$message/>
                @enderror
                </div>   
                
                <div class="form-group m-2">
                    <label for="pic" class="form-label">Upload picture</label>
                    <input type="file" name="photo" id="pic" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}">
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

