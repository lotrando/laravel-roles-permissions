@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/obnovheslo.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-narrow container py-3">
      <div class="mb-4 text-center">
        <div class="navbar-brand navbar-brand-autodark">
          <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Laravel">
        </div>
      </div>
      <form class="card card-md" action="{{ route('password.email') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="alert alert-info shadow" role="alert">
            <div class="d-flex">
              <div>
                <h4 class="alert-title">{{ __('Forgot your password ?') }}</h4>
                <div class="text-muted text-justify">
                  {{ __('No problem. Just let us your email address and we will email you a password reset link that will allow you to enter a new one.') }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              @if (session('status'))
                <div class="alert alert-success shadow" role="alert">
                  {{ session('status') }}
                </div>
              @endif
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label">{{ __('User email') }}</label>
            <input class="form-control @error('email') is-invalid is-invalid-lite @enderror" name="email" type="email" value="{{ old('email') }}"
              placeholder="{{ __('Email address') }}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-footer">
            <button class="btn btn-primary w-100 text-uppercase" type="submit">
              <svg class="icon icon-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                <path d="M3 7l9 6l9 -6"></path>
              </svg>
              {{ __('Password reset') }}
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="text-center text-white">{{ __('Forget it') }}, <a class="text-azure" href="{{ route('login') }}">{{ __('back') }}</a> {{ __('to the sign in screen') }}.
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
