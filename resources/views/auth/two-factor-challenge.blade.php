@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/lock.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight container py-4">
      <div class="card card-md shadow-sm">
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Two-Factor Authentication') }}</h2>
          <p class="text-muted mb-4 text-center">
            {{ __('Please enter the code from your authenticator app or one of your recovery codes.') }}
          </p>
          @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ url('/two-factor-challenge') }}">
            @csrf
            <div class="mb-2">
              <label class="form-label">{{ __('Authentication Code') }}</label>
              <input class="form-control @error('code') is-invalid is-invalid-lite @enderror" name="code" type="text" inputmode="numeric" autocomplete="one-time-code"
                placeholder="{{ __('Code') }}" autofocus>
              @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">{{ __('Recovery Code') }}</label>
              <input class="form-control @error('recovery_code') is-invalid is-invalid-lite @enderror" name="recovery_code" type="text" autocomplete="one-time-code"
                placeholder="{{ __('Recovery code') }}">
              @error('recovery_code')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-footer">
              <button class="btn btn-primary w-100 text-uppercase" type="submit">{{ __('Login') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-3 text-center text-white">
        <a class="text-azure" href="{{ route('login') }}" tabindex="-1">{{ __('Back to login') }}</a>
      </div>
    </div>
  </div>
@endsection
