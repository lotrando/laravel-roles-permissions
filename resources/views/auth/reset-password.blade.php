@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/reset-password.png') }}" rel="shortcut icon">
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
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-plus" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12.5 21h-5.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 1.74 1.012" />
              <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
              <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
              <path d="M16 19h6" />
              <path d="M19 16v6" />
            </svg>
          </div>
        </div>

        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Reset Password') }}</h2>
          @if ($errors->any())
            <div class="alert alert-danger mb-3" role="alert">
              {{ __('There was a problem resetting your password.') }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input name="token" type="hidden" value="{{ $request->route('token') }}">
            <div class="mb-2">
              <label class="form-label">{{ __('Email address') }}</label>
              <input class="form-control @error('email') is-invalid is-invalid-lite @enderror" name="email" type="email" value="{{ old('email', $request->email) }}"
                placeholder="{{ __('Your email address') }}" required autofocus>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('Password') }}</label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" id="password" name="password" type="password"
                placeholder="{{ __('New password') }}" required autocomplete="new-password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('Password confirmation') }}</label>
              <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="{{ __('Confirm new password') }}" required
                autocomplete="new-password">
            </div>
            <div class="form-footer">
              <button class="btn btn-primary w-100 text-uppercase" type="submit">{{ __('Reset Password') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-3 text-center text-white">
        <a class="text-azure" href="{{ route('login') }}">{{ __('Back to login') }}</a>
      </div>
    </div>
  </div>
@endsection

@section('modals')
  <div class="modal modal-blur fade" id="modal-terms" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-azure-lt">
          <h5 class="modal-title">{{ __('What personal data does the company process?') }}</h5>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">
            {{ __('The company may collect data that you provide to it!') }}
          </h3>
          <p class="text-justify">
            {{ __('Such personal data includes, in particular, the data that you provide in a completed registration, order or other form, or that you provide yourself.') }}
          </p>
        </div>
        <div class="modal-footer">
          <button class="btn float-left me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('#terms').focus();

    function check_agree(form) {
      if (form.terms.checked) {
        form.submitButton.disabled = false;
      } else {
        form.submitButton.disabled = true;;
      }
    }
  </script>
@endpush
