@extends('layout.error')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/error.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="empty">
        <div class="empty-header">500</div>
        <p class="empty-title">Oops… You just found an error page</p>
        <p class="empty-subtitle text-muted">
          We are sorry but our server encountered an internal error
        </p>
        <div class="empty-action">
          <a class="btn btn-primary" href="{{ URL::previous() }}">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
              stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="5" y1="12" x2="19" y2="12" />
              <line x1="5" y1="12" x2="11" y2="18" />
              <line x1="5" y1="12" x2="11" y2="6" />
            </svg>
            Take me home
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
