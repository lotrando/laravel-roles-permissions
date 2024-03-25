@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/login.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight container py-4">
      <div class="mb-4 text-center">
        <div class="navbar-brand navbar-brand-autodark">
          <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Laravel">
        </div>
      </div>
      <div class="card card-md shadow-sm">
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">Login to your account</h2>
          <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-2">
              <label class="form-label">{{ __('Email address') }}</label>
              <input class="form-control @error('email') is-invalid is-invalid-lite @enderror" name="email" type="text" value="{{ old('personal_number') }}" placeholder="Email">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                {{ __('Password') }}
              </label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" id="password" name="password" type="password" value="{{ old('password') }}"
                placeholder="{{ __('User password') }}" autocomplete="off">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mt-5">
              <label class="form-check">
                <input class="form-check-input" name="remember" type="checkbox" />
                <span class="form-check-label">{{ __('Remember me on this device') }}</span>
              </label>
            </div>
            <div class="form-footer">
              <button class="btn btn-blue w-100 text-uppercase hover-shadow mb-2" type="submit">{{ __('Sign in') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-secondary mt-3 text-center">
        Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
      </div>
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
