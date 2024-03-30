<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('favicon')
    <title>{{ env('APP_NAME' ?? 'Laravel') }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="{{ asset('libs/datatables/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/datatables/css/fixedHeader.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/multiselect/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" />

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

      :root {
        --tblr-font-sans-serif: 'Ubuntu', sans-serif;
        --tblr-body-color: #516274;
      }

      .navbar-expand-md .navbar-nav .nav-link {
        --tblr-navbar-nav-link-padding-x: 0.55rem;
      }

      body {
        /* font-feature-settings: "cv03", "cv04", "cv11";
        background-image: url('../img/blocks.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        back` */
      }

      .modal-status {
        height: 5px;
      }

      .dropdown-menu {
        --tblr-dropdown-padding-x: 0.25rem;
        --tblr-dropdown-padding-y: 0.25rem;
        --tblr-dropdown-item-padding-x: 0.5rem;
        --tblr-dropdown-item-padding-y: 0.5rem;
        --tblr-dropdown-header-padding-x: 0.75rem;
        --tblr-dropdown-header-padding-y: 0.25rem;
        --tblr-dropdown-link-hover-bg: rgba(var(--tblr-blue-rgb), 0.08);
        border: var(--tblr-dropdown-border-width) solid var(--tblr-dropdown-border-color);
        border-radius: var(--tblr-dropdown-border-radius);
      }

      .dropdown-item:hover {
        border-radius: 4px;
        background-color: var(--tblr-dropdown-link-hover-bg);
      }

      td {
        text-align: left;
        vertical-align: middle;
      }

      #toast-container>div {
        width: 350px;
      }
    </style>
  </head>

  <body>
    <!-- particles.js container -->
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
            @yield('searchbox')
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
    <script src="{{ asset('libs/toastr/toastr.min.js') }}" defer></script>
    <script src="{{ asset('libs/moment/moment-with-locales.min.js') }}" defer></script>
    <script src="{{ asset('libs/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('libs/datatables/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('libs/multiselect/js/jquery.multi-select.js') }}"></script>
    @stack('scripts')
  </body>

</html>
