@extends('layouts.guest-master')
@section('title', 'Login')
@section('content')
  <div style="margin-top: 100px;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
            @include('includes.message')
                <div class="card shadow-lg mb-2">
                    <h5 class="text-center mt-3">Login Here</h5>
    
                    <div class="card-body">
                        <form method = "POST" action="{{route('loginUser')}}">
                        @csrf
                            <div class="form-group mt-2">
                                <label for="email"><h6>Email</h6></label>
                                <input type="email" name = "email" class="form-control">
                            </div>
    
                            <div class="form-group mt-2">
                                <label for="password"><h6>Password</h6></label>
                                <input type="password" name = "password" class="form-control">
                            </div>
    
                            <div class="text-center">
                                <div class="form-group mt-2">
                                    <button class="btn btn-success">Login</button>
                                </div>
                            </div>

                        </form>
                        
                        <div class="text-center mt-2">
                            <a href="{{route('register')}}" class="text-decoration-none">Not Yet Registered?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        const alert = document.getElementById('msg');
        setTimeout(()=>{
            alert.remove()
        }, 4000)
    </script>
@endsection