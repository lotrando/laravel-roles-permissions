@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/login.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight container py-3">
      <div class="mb-4 text-center">
        <div class="navbar-brand navbar-brand-autodark">
          <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Laravel">
        </div>
      </div>
      <div class="card card-md shadow-sm">
        <div class="card-stamp">
          <div class="card-stamp-icon bg-blue">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5" />
              <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
              <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
              <path d="M15 19l2 2l4 -4" />
            </svg>
          </div>
        </div>
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Login to your account') }}</h2>
          @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-2">
              <label class="form-label">{{ __('Email address') }}</label>
              <input class="form-control @error('email') is-invalid is-invalid-lite @enderror" name="email" type="text" value="{{ old('email') }}"
                placeholder="{{ __('Your email address') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                {{ __('Password') }}
                <span class="form-label-description">
                  <a href="forgot-password">{{ __('I forgot password') }}</a>
                </span>
              </label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" id="password" name="password" type="password" value="{{ old('password') }}"
                placeholder="{{ __('Password') }}" autocomplete="off">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mt-5">
              <label class="form-check">
                <input class="form-check-input" id="showpass" name="showpass" type="checkbox" onclick="showPassword()" />
                <span class="form-check-label">{{ __('Visible password') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" id="remember" name="remember" type="checkbox" />
                <span class="form-check-label">{{ __('Remember me on this device') }}</span>
              </label>
            </div>
            <div class="form-footer">
              <button class="btn btn-blue w-100 text-uppercase hover-shadow mb-2" type="submit">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5" />
                  <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                  <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                  <path d="M15 19l2 2l4 -4" />
                </svg>
                {{ __('Login') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="text-center text-white">
      {{ __('Don\'t have account yet ?') }} <a class="text-azure" href="{{ route('register') }}" tabindex="-1">{{ __('Register') }}</a>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('#remember, #email').focus()

    function showPassword() {
      var $element = $("#password");
      if ($element.attr("type") === "password") {
        $element.attr("type", "text");
      } else {
        $element.attr("type", "password");
      }
    }
  </script>
@endpush
