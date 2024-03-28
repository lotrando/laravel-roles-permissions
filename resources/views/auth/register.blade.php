@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/register.png') }}" rel="shortcut icon">
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
          <h2 class="h2 mb-4 text-center">Register your account</h2>
          <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-2">
              <label class="form-label">{{ __('Email address') }}</label>
              <input class="form-control @error('email') is-invalid is-invalid-lite @enderror" name="email" type="text" value="{{ old('personal_number') }}" placeholder="Email">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">{{ __('Name') }}</label>
              <input class="form-control @error('name') is-invalid is-invalid-lite @enderror" name="name" type="text" value="{{ old('name') }}"
                placeholder="Zadejte své příjmení a jméno">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('Password') }}</label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" id="password" name="password" data-bs-container="body" data-bs-toggle="popover"
                data-bs-placement="top"
                data-bs-content="{{ __('Zvolte si své heslo. Musí mít 8 znaků nebo více a dobře si ho zapamatujte, heslo budete používat ke všem autorizovaným aplikacím na Intranetu KHN.') }}"
                type="password" value="{{ old('password') }}" placeholder="Zvolte si své heslo" autocomplete="off">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">{{ __('Password confirmation') }}</label>
              <input class="form-control @error('password') is-invalid is-invalid-lite @enderror" id="password_confirmation" name="password_confirmation" type="password"
                value="{{ old('password_confirmation') }}" placeholder="Potvrďte vámi zvolené heslo" autocomplete="off">
              @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mt-5">
              <label class="form-check">
                <input class="form-check-input" id="terms" name="terms" type="checkbox" onClick="check_agree(this.form)" />
                <span class="form-check-label">{{ __('Agree the') }} <a data-bs-toggle="modal" data-bs-target="#modal-terms" href="#">{{ __('terms and policy') }}</a>.</span>
              </label>
            </div>
            <div class="form-footer">
              <button class="btn btn-primary w-100 text-uppercase" id="submitButton" type="submit" value="{{ __('Sign up') }}" disabled>{{ __('Sign up') }}</button>
            </div>
          </form>
          <div class="text-secondary mt-3 text-center">
            Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modals')
  <div class="modal modal-blur fade" id="modal-terms" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-azure-lt">
          <h5 class="modal-title">Jaké osobní údaje společnost zpracovává ?</h5>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">
            Společnost o Vás může shromažďovat údaje, které ji sami sdělíte !
          </h3>
          <p class="text-justify">
            Takovými osobními údaji jsou zejména údaje, které uvedete ve vyplněném registračním, objednávkovém či jiném formuláři, nebo
            které společnosti sdělíte.
          </p>
        </div>
        {{-- <div class="modal-footer">
          <button class="btn me-auto float-left" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function check_agree(form) {
      if (form.terms.checked) {
        form.submitButton.disabled = false;
      } else {
        form.submitButton.disabled = true;;
      }
    }
  </script>
@endpush
