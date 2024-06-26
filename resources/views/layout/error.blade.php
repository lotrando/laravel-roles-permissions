<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('favicon')
    <title>{{ env('APP_NAME' ?? 'Laravel') }}</title>
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

      :root {
        --tblr-font-sans-serif: 'Ubuntu', sans-serif;
        --tblr-body-color: #aab2b9;
      }

      body {
        font-feature-settings: "cv03", "cv04", "cv11";
        background-image: url('../img/404.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>

  <body>
    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    {{-- Page --}}
    <div class="page page-center">
      <div class="container-tight container">
        @yield('page')
      </div>
    </div>
    <script src="{{ asset('js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('js/demo.min.js') }}" defer></script>
  </body>

</html>
