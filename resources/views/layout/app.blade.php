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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('libs/aos/aos.css') }}" rel="stylesheet">
  </head>

  <body>
    <script src="{{ asset('js/demo-theme.min.js') }}"></script>
    <div class="page">
      @include('layout.include.topbar')
      @include('layout.include.navbar')
      <div class="page-wrapper">
        @yield('page-header')
        <div class="page-body">
          <div class="container-fluid">
            @yield('page')
          </div>
        </div>
        @include('layout.include.footer')
      </div>
    </div>
    @include('layout.include.logout')
    @include('layout.include.2fa')
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
    <script src="{{ asset('libs/aos/aos.js') }}"></script>
    <script>
      AOS.init({
        duration: 500,
        once: true
      });
    </script>
    <script>
      // 2FA Modal trigger
      $('#showTwoFactorQr').on('click', function() {
        $('#twoFactorQrModal').modal('show');
      });

      // Localization
      var currentLocale = '{{ app()->getLocale() }}';

      $('#lang-toggle').click(function() {
        var newLocale = (currentLocale === 'cs') ? 'en' : 'cs';
        $.post('/set-locale', {
          locale: newLocale,
          _token: '{{ csrf_token() }}'
        }, function() {
          location.reload();
        });
      });

      function updateLangFlag(locale) {
        if (locale === 'en') {
          $('#lang-flag').removeClass().addClass('flag flag-xs flag-country-cz');
          $('#lang-toggle').attr('title', 'CZE');
        } else {
          $('#lang-flag').removeClass().addClass('flag flag-xs flag-country-gb');
          $('#lang-toggle').attr('title', 'ENG');
        }
      }

      updateLangFlag(currentLocale);
    </script>
    @stack('scripts')
  </body>

</html>
