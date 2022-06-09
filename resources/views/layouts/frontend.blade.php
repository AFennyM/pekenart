<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Styles -->
    {{-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">

    <style>
        a {
            text-decoration: none !important;
            color: black !important;
        }
    </style>
    {{-- <link href="{{ asset('admin/css/light-bootstrap-dashboard.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{asset('Asset1/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('Asset1/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Asset1/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('Asset1/css/style.css')}}"> --}}
    {{-- <link href="{{ asset('frontend/css/login.css') }}" rel="stylesheet"> --}}
</head>
<body>
    @include('layouts.inc.frontendnavbar')
    <div class="content">
        @yield('content')
    </div>


    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>

    {{-- sweetalert.js.org cdn --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal('{{ session('status') }}')
        </script>
    @endif
    @yield('scripts')
    {{-- <script src="{{ asset('frontend/js/login.js') }}" defer></script></body> --}}
</body>
</html>
