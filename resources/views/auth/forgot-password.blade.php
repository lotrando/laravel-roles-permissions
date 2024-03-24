@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/obnovheslo.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight py-2">
      <form class="card card-md" action="{{ route('password.email') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="mb-3 text-center">
            <a class="navbar-brand navbar-brand-autodark" href="#"><img src="{{ asset('static/logo-khn.png') }}" alt="Tabler logo" height="60"></a>
          </div>
          <div class="alert alert-info shadow" role="alert">
            <div class="d-flex">
              <div>
                <h4 class="alert-title">{{ __('Forgot your password?') }}</h4>
                <div class="text-muted text-justify">
                  {{ __('No problem. Just let us your email address and we will email you a password reset link that will allow you to enter a new one.') }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              @if ($errors->any())
                <div class="alert alert-danger text-danger shadow">
                  <ul class="mt-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              @if (session('status'))
                <div class="alert alert-success shadow" role="alert">
                  {{ session('status') }}
                </div>
              @endif
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">{{ __('Email address') }}</label>
            <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="{{ __('Email address') }}">
          </div>
          <div class="form-footer">
            <button class="btn btn-primary w-100 text-uppercase" type="submit">{{ __('Password reset') }}</button>
          </div>
          <div class="hr-text">{{ __('or') }}</div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <a class="btn btn-white w-100 hover-shadow" href="{{ route('login') }}">
                  {{ __('Sign in') }}
                </a>
              </div>
              <div class="col">
                <a class="btn btn-white w-100 hover-shadow" href="{{ route('register') }}">
                  {{ __('Sign up') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    function showPassword() {
      var element = document.getElementById("password");
      if (element.type === "password") {
        element.type = "text";
      } else {
        element.type = "password";
      }
    };
  </script>
@endsection
