@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/home.png') }}" rel="shortcut icon">
@endsection

@section('page-header')
  {{-- Page header --}}
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          {{-- Page title --}}
          <h2 class="page-title h2">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg class="icon text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
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
  <div class="page-body">
    <div class="col-12">
      <div class="card card-md">
        <div class="card-stamp card-stamp-lg">
          <div class="card-stamp-icon bg-primary">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-fingerprint" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" />
              <path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" />
              <path d="M12 11v2a14 14 0 0 0 2.5 8" />
              <path d="M8 15a18 18 0 0 0 1.8 6" />
              <path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" />
            </svg>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-10">
              <h3 class="h1">{{ __('Two factor authentication') }}</h3>
              <div class="markdown text-secondary">
                @if (!auth()->user()->two_factor_secret)
                  <span class="status status-red">
                    <span class="status-dot"></span>
                    {{ __('Disabled') }}
                  </span>
                @else
                  <span class="status status-lime">
                    <span class="status-dot status-dot-animated"></span>
                    {{ __('Enabled') }}
                  </span>
                @endif
              </div>
              <div class="mt-3">
                @if (!auth()->user()->two_factor_secret)
                  <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modals')
@endsection

@push('scripts')
@endpush
