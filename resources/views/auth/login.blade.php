@extends("layouts.app")

@section('title', 'Login')
@section('content')
    <div class="card my-3 w-70 mx-auto shadow ">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        <div class="card-header  text-center">
            <h1>Login</h1>
        </div>
        <div class="card-body">
            <form action="/login"  method="POST">
                @csrf
                  <div class="form-group m-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email"/>
                    @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group m-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" id="password"/>
                    @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                 
                
               
              
                <input type="reset" value="Reset" class="btn btn-warning btn-md float-end m-2"/>
                <button class="btn btn-primary btn-md float-end m-2"> <i class="bi bi-plus"></i> Save</button>
                 
            </form>
        </div>
    </div>
    
@endsection
