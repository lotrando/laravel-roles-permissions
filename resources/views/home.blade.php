@extends('layout.app')

@section('favicon')
  <link type="image/svg" href="{{ asset('img/favicons/home.svg') }}" rel="shortcut icon">
@endsection

@section('page-header')
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title h2">
            <span class="nav-link-icon d-inline-block">
              <svg class="icon text-azure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
              </svg>
            </span>
            {{ __('Homepage') }}
          </h2>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page')
  <div class="page-body m-0">
    <div class="col-12 m-0 mx-auto">
      <div class="card card-md" data-aos="fade-up">
        <div class="card-stamp card-stamp-lg">
          <div class="card-stamp-icon bg-primary">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-auth-2fa" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M7 16h-4l3.47 -4.66a2 2 0 1 0 -3.47 -1.54" />
              <path d="M10 16v-8h4" />
              <path d="M10 12l3 0" />
              <path d="M17 16v-6a2 2 0 0 1 4 0v6" />
              <path d="M17 13l4 0" />
            </svg>
          </div>
        </div>
        <div class="card-header bg-lime-lt">
          <h3 class="card-title">{{ __('Two factor authentication') }}</h3>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-10">
              <div class="markdown text-secondary">
                @if (!auth()->user()->two_factor_secret)
                  <span class="status status-red">
                    <span class="status-dot"></span>
                    {{ __('Disabled') }}
                  </span>
                @else
                  <span class="status status-lime mb-3">
                    <span class="status-dot status-dot-animated"></span>
                    {{ __('Enabled') }}
                  </span>
                  @auth
                    @if (auth()->user()->two_factor_secret)
                      <p>{{ __('Scan this QR code with your two-factor authentication app.') }}</p>
                      <div style="display:inline-block; background:#fff; padding:16px; border-radius:8px; box-shadow:0 0 8px #ccc;">
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                      </div>
                      <p class="mt-3">{{ __('Recovery codes:') }}</p>
                      <ul class="list-unstyled">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                          <li><code>{{ $code }}</code></li>
                        @endforeach
                      </ul>
                    @else
                      <div class="alert alert-warning" role="alert">
                        {{ __('Two-factor authentication is not enabled.') }}
                      </div>
                    @endif
                  @endauth
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          @auth
            @if (!auth()->user()->two_factor_secret)
              <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                <button class="btn btn-lime" type="submit">
                  <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M16 9a3 3 0 1 1 -3 3l.005 -.176a3 3 0 0 1 2.995 -2.824" />
                    <path d="M16 5a7 7 0 0 1 0 14h-8a7 7 0 0 1 0 -14zm0 2h-8a5 5 0 1 0 0 10h8a5 5 0 0 0 0 -10" />
                  </svg>
                  {{ __('Enable') }}
                </button>
              </form>
            @else
              <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                  <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M16 9a3 3 0 1 1 -3 3l.005 -.176a3 3 0 0 1 2.995 -2.824" />
                    <path d="M16 5a7 7 0 0 1 0 14h-8a7 7 0 0 1 0 -14zm0 2h-8a5 5 0 1 0 0 10h8a5 5 0 0 0 0 -10" />
                  </svg>
                  {{ __('Disable') }}
                </button>
              </form>
            @endif
          @endauth
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modals')
@endsection

@push('scripts')
@endpush
