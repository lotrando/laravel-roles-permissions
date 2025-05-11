@extends('layout.auth')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/home.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="page-body">
    <div class="col-12">
      @if (session('status'))
        <div class="alert alert-success bg-success-lt mb-3" role="alert">
          {{ session('status') }}
        </div>
      @endif
      <div class="card card-md">
        <div class="card-stamp card-stamp-lg">
          <div class="card-stamp-icon bg-primary">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-mail-opened" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 9l9 6l9 -6l-9 -6l-9 6" />
              <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
              <path d="M3 19l6 -6" />
              <path d="M15 13l6 6" />
            </svg>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-10">
              <h3 class="h1">{{ __('Email verification') }}</h3>
              <div class="markdown text-secondary">
                <p class="auth-text">{{ __('Before proceeding, please check your email for a verification link.') }}<br>
                  {{ __('If you did not receive the email, click below to request another.') }}</p>
                <form class="auth-form" method="POST" action="{{ route('verification.send') }}">
                  @csrf
                  <button class="btn btn-success" type="submit">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-mail-forward" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" />
                      <path d="M3 6l9 6l9 -6" />
                      <path d="M15 18h6" />
                      <path d="M18 15l3 3l-3 3" />
                    </svg>
                    {{ __('Resend verification email') }}
                  </button>
                </form>
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
