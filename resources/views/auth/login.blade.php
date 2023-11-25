<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots"
          content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/vendor/perfect-scrollbar.css')}}"
          rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/app.css')}}"
          rel="stylesheet">
</head>

<body class="layout-login">
<div class="layout-login__overlay"></div>
<div class="layout-login__form bg-white"
     data-perfect-scrollbar>
    <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
        <a href="{{url('/')}}"
           class="navbar-brand"
           style="min-width: 0">
            <img class="navbar-brand-icon"
                 src="{{asset('dashboard-asset/assets/images/pcms-logo-blue.svg')}}"
                 width="25"
                 alt="Stack">
            <span>PCMS</span>
        </a>
    </div>
    <h4 class="m-0">Welcome back!</h4>
    <p class="mb-5">Login to access your Pioneers CMS Account </p>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="text-label"
                                   for="email">{{__('Email Address')}}:</label>

                            <div class="input-group input-group-merge">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-label"
                                   for="password">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                        </div>

                        <div class="row mb-0">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                        </div>
                    </form>
                </div>


    </div>


</body>
</html>
