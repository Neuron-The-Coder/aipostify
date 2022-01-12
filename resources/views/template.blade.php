<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('storage/images/favicon.ico') }}" type="image/x-icon">

  {{-- Imports --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link
  id="u-page-google-font"
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Merriweather:300,300i,400,400i,700,700i,900,900i|Bebas+Neue:400|Asap+Condensed:400,400i,500,500i,600,600i,700,700i"/>
  <link rel="stylesheet" href="{{ asset("storage/css/navbar.css") }}">
  <link rel="stylesheet" href="{{ asset("storage/css/footer.css") }}">

  @yield('import')

</head>

@php
  use Illuminate\Support\Facades\Auth;

  $user = Auth::user();

@endphp

{{-- Dummy : dummy@mail.com : iamDUMMY123 --}}

<body class="">

  <div class="collapse-overlay"></div>
  {{-- Navbar Here --}}
  <nav>
    <div class="nav-container">
      <div class="nav-title">
        <a href="{{ url("/") }}"><img src="{{ asset('storage/images/logo.png') }}" alt="" srcset=""></a>
      </div>
      <div class="nav-menu">
        <ul class="nav-lists">
          @guest
            <li class="nav-link"><a href="{{ route('login') }}">Login</a></li>
            <li class="nav-link"><a href="{{ route('register') }}">Register</a></li>
          @endguest
          @auth
            <li class="nav-link users"><a href="{{ route('profile') }}"><i class="bi bi-person-fill"></i> {{ $user->name }}</a></li>
            <li class="nav-link"><a href="{{ route('input-stock') }}">Input</a></li>
            <li class="nav-link"><a href="{{ route('output-stock') }}">Output</a></li>
            <li class="nav-link"><a href="{{ route('logout-cont') }}">Logout</a></li>
          @endauth
          <li class="nav-link nav-link-dark"><i class="bi bi-moon-fill"></i></li>
          <li class="nav-link nav-link-light"><i class="bi bi-sun-fill"></i></li>
          <li class="nav-burger"><button><i class="bi bi-list"></i></button></li>
        </ul>
      </div>

    </div>
    <div class="nav-collapse">
      <ul class="nav-collapse-lists">
        <li class="nav-collapse-close"><button id="nav-collapse-close-button">X</button></li>
        @guest
          <li class="nav-collapse-link"><a href="{{ route('login') }}">Login</a></li>
          <li class="nav-collapse-link"><a href="{{ route('register')  }}">Register</a></li>
        @endguest
        @auth
          <li class="nav-collapse-link users"><a href="{{ route('profile') }}"><i class="bi bi-person-fill"></i> {{ $user->name }}</a></li>
          <li class="nav-collapse-link"><a href="{{ route('input-stock') }}">Input</a></li>
          <li class="nav-collapse-link"><a href="{{ route('output-stock') }}">Output</a></li>
          <li class="nav-collapse-link"><a href="{{ route('logout-cont') }}">Logout</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  @yield('content')

  {{-- Footer Here --}}
  <footer>
    <div class="footer-container">
      <div class="footer-title">Follow us at</div>
      <div class="footer-social-media">
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-twitter"></i></a>
      </div>
      <div class="footer-copyright">Copyright &copy; AiPostify. All rights reserved</div>
    </div>
  </footer>

  {{-- Untuk Navbar --}}
  <script>
    function handleEvent(e){
      document.querySelector("body").classList.add("collapse-active");
  
      document.querySelectorAll(".collapse-overlay, #nav-collapse-close-button").forEach((el, idx) => {
        el.addEventListener("click", function(e) {
          document.querySelector("body").classList.remove("collapse-active");
        });
      });

      
      
    }

    document.querySelector(".nav-burger").addEventListener("click", (e) => {handleEvent(e)});
    document.querySelectorAll(".nav-link-light, .nav-collapse-link-light").forEach(el => {
      el.addEventListener("click", (e) => {
        document.querySelector("body").classList.add("dark");
        localStorage.setItem("darkmode", "1");
      });
    });
    document.querySelectorAll(".nav-link-dark, .nav-collapse-link-dark").forEach(el => {
      el.addEventListener("click", (e) => {
        document.querySelector("body").classList.remove("dark");
        localStorage.setItem("darkmode", "0");
      });
    });

    // Simpan darkmode di Local Storage
    if (localStorage.getItem("darkmode") === null) localStorage.setItem("darkmode", "0");
    if (localStorage.getItem("darkmode") === "1") document.querySelector("body").classList.add("dark"); 

  </script>

</body>
</html>