@extends('layout.error')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/error.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="empty">
        <div class="empty-header">404</div>
        <p class="empty-title">{{ __('You just found an error page') }}</p>
        <p class="empty-subtitle text-muted">
          {{ __('We are sorry, but the page you are looking for was not found.') }}
        </p>
        <div class="empty-action">
          <a class="btn btn-primary" href="{{ url()->previous() }}">
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="5" y1="12" x2="19" y2="12" />
              <line x1="5" y1="12" x2="11" y2="18" />
              <line x1="5" y1="12" x2="11" y2="6" />
            </svg>
            {{ __('Back') }}
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
