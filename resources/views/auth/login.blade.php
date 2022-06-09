@extends('layouts.app')

@section('content')
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Asset1/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('Asset1/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Asset1/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('Asset1/css/style.css')}}">
<body>
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('Asset1/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('Asset1/js/popper.min.js')}}"></script>
    <script src="{{asset('Asset1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Asset1/js/main.js')}}"></script>
</body>
  </head>
</html>
@endsection


    {{-- <title>Login PekenArt</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('Asset1/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>PekenArt</strong></h3>
            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            <form action="{{ route('login') }}" method="POST">
              <div class="form-group first">
                <label for="email">{{ __('Email Address') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="your-email@gmail.com" id="email" name="email" value="{{ old('email')}}" required autocomplete="email" autofocus>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
              </div>
              <div class="form-group last mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your Password" id="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div> --}}
    
    

    <script src="{{asset('Asset1/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('Asset1/js/popper.min.js')}}"></script>
    <script src="{{asset('Asset1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Asset1/js/main.js')}}"></script>
  </body>
</html>