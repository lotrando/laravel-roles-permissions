@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/lock.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight container py-4">
      <div class="card card-md shadow-sm">
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Confirm Password') }}</h2>
          <p class="text-muted mb-4 text-center">
            {{ __('Please confirm your password before continuing.') }}
          </p>
          @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="mb-2">
              <label class="form-label">{{ __('Password') }}</label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" name="password" type="password" placeholder="{{ __('Your password') }}" required
                autocomplete="current-password" autofocus>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-footer">
              <button class="btn btn-primary w-100 text-uppercase" type="submit">{{ __('Confirm Password') }}</button>
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
