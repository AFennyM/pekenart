<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PekenArt') }}</title>

    

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Styles -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('Asset1/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('Asset1/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Asset1/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('Asset1/css/style.css')}}"> --}}
    {{-- <link href="{{ asset('frontend/css/login.css') }}" rel="stylesheet"> --}}
</head>
<body>

    <div class="wrapper">
        @include('layouts.inc.sidebar')

        <div class="main-panel">
            @include('layouts.inc.adminnavbar')

            <div class="content">
                @yield('content')
            </div>

            @include('layouts.inc.adminfooter')
        </div>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('Asset1/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('Asset1/js/popper.min.js')}}"></script>
    <script src="{{asset('Asset1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Asset1/js/main.js')}}"></script> --}}
    <script src="{{asset('admin/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/bootstrap-switch.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="{{asset('admin/js/plugins/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('admin/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="{{asset('admin/js/light-bootstrap-dashboard.js?v=2.0.0')}} "></script>
    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('admin/js/demo.js')}}"></script>
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
