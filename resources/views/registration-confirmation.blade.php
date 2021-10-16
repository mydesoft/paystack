@extends('layouts.guest-master')
@section('title', 'Register')
@section('content')
  <div style="margin-top: 100px;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
            @include('includes.message')
                <div class="card shadow-lg mb-2">
                    <div class="card-body">
                        <small class="text-center text-danger mb-2">
                            Dear <b>{{session('user')}}</b>, your registration was successful!. <br>
                            Please note your account has to be activated by the system administrator.<br> 
                            The activation takes <b>Five Minutes</b>, after which you can proceed to 
                            <a href="{{route('login')}}">Login</a>. <br>
                            Should in case you have any issues logging into your account after the stipulated time, 
                            Please get in touch with us <a href="{{route('contact')}}">Here.</a>
                        </small>
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