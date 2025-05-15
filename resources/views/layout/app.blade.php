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
    @yield('modals')
    <!-- Modal pro 2FA QR kód -->
    <div class="modal fade" id="twoFactorQrModal" aria-labelledby="twoFactorQrModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-lime-lt">
            <h5 class="modal-title">{{ __('User authentication settings') }}</h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            @auth
              @if (Auth::user()->two_factor_secret)
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
          </div>
          <div class="modal-footer">
            <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
            @auth
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
            @endauth
          </div>
        </div>
      </div>
    </div>
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
