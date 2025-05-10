@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/obnovheslo.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight container py-4">
      <div class="card card-md shadow-sm">
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Two-Factor Authentication') }}</h2>
          @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
              {{ session('status') }}
            </div>
          @endif

          @if (!auth()->user()->two_factor_secret)
            <p class="mb-3 text-center">{{ __('Two-factor authentication is not enabled.') }}</p>
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
              @csrf
              <button class="btn btn-primary w-100" type="submit">
                {{ __('Enable Two-Factor Authentication') }}
              </button>
            </form>
          @else
            <p class="mb-3 text-center">{{ __('Two-factor authentication is enabled.') }}</p>
            <div class="mb-3 text-center">
              {!! auth()->user()->twoFactorQrCodeSvg() !!}
            </div>
            <p class="mb-1">{{ __('Recovery codes:') }}</p>
            <ul class="mb-3">
              @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                <li><code>{{ $code }}</code></li>
              @endforeach
            </ul>
            <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
              @csrf
              <button class="btn btn-secondary w-100" type="submit">
                {{ __('Regenerate Recovery Codes') }}
              </button>
            </form>
            <form class="mt-2" method="POST" action="{{ url('user/two-factor-authentication') }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger w-100" type="submit">
                {{ __('Disable Two-Factor Authentication') }}
              </button>
            </form>
          @endif
        </div>
      </div>
      <div class="mt-3 text-center text-white">
        <a class="text-azure" href="{{ route('login') }}" tabindex="-1">{{ __('Back to login') }}</a>
      </div>
    </div>
  </div>
@endsection
