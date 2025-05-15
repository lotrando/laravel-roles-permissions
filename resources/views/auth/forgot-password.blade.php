@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/reset-password.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-narrow container py-3">
      <div class="mb-4 text-center">
        <div class="navbar-brand navbar-brand-autodark">
          <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Laravel">
        </div>
      </div>
      <div class="card card-md shadow-sm">
        <div class="card-stamp">
          <div class="card-stamp-icon bg-blue">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-cog" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 21h-5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10c.564 0 1.074 .234 1.437 .61" />
              <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
              <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
              <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
              <path d="M19.001 15.5v1.5" />
              <path d="M19.001 21v1.5" />
              <path d="M22.032 17.25l-1.299 .75" />
              <path d="M17.27 20l-1.3 .75" />
              <path d="M15.97 17.25l1.3 .75" />
              <path d="M20.733 20l1.3 .75" />
            </svg>
          </div>
        </div>
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Reset password') }}</h2>
          @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form action="{{ route('password.email') }}" method="POST" autocomplete="off">
            @csrf
            <p class="text-muted text-justify">
              {{ __('No problem. Just let us your email address and we will email you a password reset link that will allow you to enter a new one.') }}
            </p>
            <div class="row">
              <div class="col-12">
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
                    <svg class="icon icon-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                      <path d="M3 7l9 6l9 -6"></path>
                    </svg>
                    {{ __('Password reset') }}
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="text-center text-white">{{ __('Forget it') }}, <a class="text-azure" href="{{ route('login') }}">{{ __('back') }}</a> {{ __('to the sign in screen') }}.
    </div>
  </div>
@endsection
