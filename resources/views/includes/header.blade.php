<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Astract Test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>
             
            </ul>
            
            <div class="">
            <a href="{{route('register')}}"><button class="btn btn-sm btn-success text-white">Register</button></a>
            <a href="{{route('login')}}"><button class="btn btn-sm btn-success text-white">Login</button></a>
    
            </div>
        </div>
        </div> 
    </nav>