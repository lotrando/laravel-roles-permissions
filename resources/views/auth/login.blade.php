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
        <div class="card-stamp">
          <div class="card-stamp-icon bg-blue">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
              <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
              <path d="M8 11v-5a4 4 0 0 1 8 0" />
            </svg>
          </div>
        </div>
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
