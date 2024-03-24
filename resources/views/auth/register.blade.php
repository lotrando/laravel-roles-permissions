@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/register.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
      <div class="container-tight px-lg-5 container my-5">
        <h2 class="h2 mb-5 text-center">
          Registrovat se do Intranetu KHN
        </h2>
        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="mb-2">
            <label class="form-label">{{ __('Personal number') }}</label>
            <input class="form-control @error('personal_number') is-invalid is-invalid-lite @enderror" name="personal_number" type="text" value="{{ old('personal_number') }}"
              placeholder="Zadejte své osobní číslo">
            @error('personal_number')
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
        <div class="hr-text">{{ __('or') }}</div>
        <div class="row">
          <div class="col">
            <a class="btn btn-white w-100 hover-shadow" href="{{ route('index') }}">
              {{ __('Na hlavní stránku') }}
            </a>
          </div>
          <div class="col">
            <a class="btn btn-white w-100 hover-shadow" href="{{ route('login') }}">
              {{ __('Sign in') }}
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 d-none d-lg-block">
      <!-- Photo -->
      <div class="h-100 min-vh-100 bg-cover" style="background-image: url(../static/background-khn.jpg)"></div>
    </div>
  </div>

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

  <script>
    function check_agree(form) {
      if (form.terms.checked) {
        form.submitButton.disabled = false;
      } else {
        form.submitButton.disabled = true;;
      }
    }
  </script>
@endsection
