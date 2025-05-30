<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Goreng Joss</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .clickable-banner {
            transition: transform 0.3s ease, opacity 0.3s ease;
            cursor: pointer;
        }
    
        .clickable-banner:hover {
            transform: scale(1.03);
            opacity: 0.9;
        }
    
        .clickable-banner:active {
            transform: scale(0.97);
            opacity: 0.8;
        }
    </style>    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/visi-misi') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Ayam Goreng Joss" height="50">
            </a>            
            <a class="navbar-brand" href="{{ url('/') }}">Ayam Goreng Joss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/order') }}">Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/chat') }}">Chat</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                  @auth
                    <li class="nav-item me-2">
                      <span class="nav-link">Hai, {{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
                    </li>
                    <li class="nav-item me-2">
                      <form method="GETs" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                      </form>
                    </li>
                  @else
                    <li class="nav-item me-2">
                      <a class="btn btn-danger" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item me-2">
                      <a class="btn btn-danger" href="{{ route('register') }}">Register</a>
                    </li>
                  @endauth
                </ul>
              </div> 
        </div>     
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <footer  class="bg-danger text-white text-center py-3 mt-4">
        &copy; 2025 Ayam Goreng Joss
    </footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
