@if($errors->any())
    <div class="alert alert-danger" id="msg">
        @foreach ($errors->all() as $error)
            <li> {{$error}}
        @endforeach
    </div>    
@endif

@if (session('success'))
    <div class="alert alert-success" id="msg">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="msg">
        {{session('error')}}
    </div>
@endif