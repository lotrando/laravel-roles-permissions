<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ env('APP_NAME' ?? 'Laravel') }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    @stack('header')
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    @stack('css')
    @stack('style')
  </head>

  <body>
    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    {{-- Page --}}
    <div class="page">
      {{-- Topbar --}}
      @include('layout.include.topbar')
      {{-- Navbar --}}
      @include('layout.include.navbar')
      {{-- Page wrapper --}}
      <div class="page-wrapper">
        {{-- Page header --}}
        @yield('page-header')
        {{-- Page body --}}
        <div class="page-body">
          <div class="container-fluid">
            @stack('searchbox')
            @yield('page')
          </div>
        </div>
        {{-- Footer --}}
        @include('layout.include.footer')
      </div>
    </div>
    @include('layout.include.logout')
    @yield('modals')
    <script src="{{ asset('libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('js/demo.min.js') }}" defer></script>
    @stack('scripts')
  </body>

</html>
