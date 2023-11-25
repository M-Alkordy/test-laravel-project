<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>

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
        <a href="index.html"
           class="navbar-brand"
           style="min-width: 0">
            <img class="navbar-brand-icon"
                 src="{{asset('dashboard-asset/assets/images/pcms-logo-blue.svg')}}"
                 width="25"
                 alt="Stack">
            <span>PCMS</span>
        </a>
    </div>
    <h4 class="m-0">Welcome!</h4>
    <p class="mb-5">Create New Account</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="text-label">{{ __('Name') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-label">{{ __('Email Address') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-label">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="text-label">{{ __('Confirm Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
</body>
</html>
