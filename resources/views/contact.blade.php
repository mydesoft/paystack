@extends('layouts.guest-master')
@section('title', 'Contact')
@section('content')
  <div style="margin-top: 100px;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
            @include('includes.message')
                <div class="card shadow-lg mb-2">
                    <small class="text-center text-danger mt-3">Get in touch with us? 
                        <br>Fill in the forms and we will work on your query immediately.
                    </small>
    
                    <div class="card-body">
                        <form method ="POST" action="{{route('contactAction')}}">
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
                                <label for="subject"><h6>Subject</h6></label>
                                <input type="text" name = "subject" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label for="message"><h6>Message</h6></label>
                                <textarea type="text" name="message" rows = "4" class="form-control"></textarea>
                            </div>
    
                            <div class="text-center">
                                <div class="form-group mt-2">
                                    <button class="btn btn-block btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
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