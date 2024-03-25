@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/') }}" rel="shortcut icon">
@endsection

@section('header')
  {{-- Page header --}}
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          {{-- Page pre-title --}}
          <div class="page-pretitle">
            Page
          </div>
          {{-- Page title --}}
          <h2 class="page-title text-blue h2">
            Empty
          </h2>
        </div>
        {{-- Page title actions --}}
        <div class="d-print-none col-auto ms-auto">
          <div class="btn-list">
            {{-- Buttons --}}
            @yield('buttons')
            @yield('search')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page')
@endsection

@section('modals')
@endsection

@push('scripts')
@endpush
