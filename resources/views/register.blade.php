@extends('layouts.guest-master')
@section('title', 'Register')
@section('content')
  <div style="margin-top: 100px;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
            @include('includes.message')
                <div class="card shadow-lg mb-2">
                    <h5 class="text-center mt-3">Register Here</h5>
    
                    <div class="card-body">
                        <form method = "POST" action="{{route('register')}}">
                        @csrf
                            <div class="form-group mt-2">
                                <label for="name"><h6>Name</h6></label>
                                <input type="text" name = "name" class="form-control">
                            </div>
    
                            <div class="form-group mt-2">
                                <label for="email"><h6>Email</h6></label>
                                <input type="email" name = "email" class="form-control">
                            </div>
    
                            <div class="form-group mt-2">
                                <label for="username"><h6>Username</h6></label>
                                <input type="text" name = "username" class="form-control">
                            </div>
    
                            <div class="form-group mt-2">
                                <label for="password"><h6>Password</h6></label>
                                <input type="password" name="password" class="form-control">
                            </div>
    
                            <div class="form-group mt-2">
                                <label for="confirm password"><h6>Confirm Password</h6></label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
    
                            <div class="text-center">
                                <div class="form-group mt-2">
                                    <button class="btn btn-block btn-success">Register</button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-2">
                            <a href="{{route('login')}}" class="text-decoration-none">Already Registered?</a>
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