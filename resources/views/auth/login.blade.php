@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/login.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
      <div class="container-tight px-lg-5 container my-5">
        <h2 class="h2 mb-5 text-center">
          Přihlásit se do Intranetu KHN
        </h2>
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
          @csrf
          <div class="mb-2">
            <label class="form-label">{{ __('Personal number') }}</label>
            <input class="form-control @error('personal_number') is-invalid is-invalid-lite @enderror" name="personal_number" type="text" value="{{ old('personal_number') }}"
              placeholder="{{ __('Personal number') }}" autofocus>
            @error('personal_number')
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
        <div class="hr-text">{{ __('or') }}</div>
        <div class="row">
          <div class="col">
            <a class="btn btn-white w-100 hover-shadow" href="{{ route('index') }}">
              {{ __('Na hlavní stránku') }}
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
    <div class="col-12 col-lg-6 d-none d-lg-block">
      <!-- Photo -->
      <div class="h-100 min-vh-100 bg-cover" style="background-image: url(../img/b.jpg)"></div>
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
