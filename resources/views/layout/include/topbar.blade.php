<!-- Topbar -->
<header class="navbar navbar-expand-md d-print-none">
  <div class="container-fluid">
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-menu" type="button" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-md-3 pe-0">
      <a href="{{ route('index') }}">
        <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Laravel logo">
      </a>
    </h1>
    <div class="navbar-nav order-md-last flex-row">
      <div class="nav-item d-none d-md-flex nav-item d-none d-md-flex">
        <div class="btn-list">
          <span class="nav-link cursor-pointer px-0" id="lang-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="">
            <span class="flag" id="lang-flag"></span>
          </span>
          <div class="d-none d-md-flex">
            <a class="nav-link hide-theme-dark px-0" data-bs-toggle="tooltip" data-bs-placement="bottom" href="?theme=dark" title="{{ __('Dark Mode') }}">
              <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
              </svg>
            </a>
            <a class="nav-link hide-theme-light px-0" data-bs-toggle="tooltip" data-bs-placement="bottom" href="?theme=light" title="{{ __('Light Mode') }}">
              <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
              </svg>
            </a>
          </div>
          @guest
            <a class="nav-link" href="{{ route('register') }}">
              <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'register' ? 'text-green' : '' }}">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-plus" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M12.5 21h-5.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 1.74 1.012"></path>
                  <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                  <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                  <path d="M16 19h6"></path>
                  <path d="M19 16v6"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                {{ __('Register') }}
              </span>
            </a>
            <a class="nav-link" href="{{ route('login') }}">
              <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'login' ? 'text-green' : '' }}">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-lock-check" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5" />
                  <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                  <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                  <path d="M15 19l2 2l4 -4" />
                </svg>
              </span>
              <span class="nav-link-title">
                {{ __('Login') }}
              </span>
            </a>
          @endguest
        </div>
      </div>
      @auth
        <div class="nav-item dropdown m-1">
          <a class="nav-link d-flex text-reset p-0" data-bs-toggle="dropdown" href="#" aria-label="Open user menu">
            <div class="d-none d-xl-block ps-1">
              <div>{{ Auth::user()->name ?? '' }}</div>
              <div class="small text-muted">{{ Auth::user()->email }}</div>
            </div>
            <span class="avatar avatar-sm ms-2" style="background-image: url({{ asset('img/avatar.png') }})"></span>
          </a>
          {{-- User Dropdown Menu --}}
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <button class="dropdown-item" id="showTwoFactorQr">
              @if (auth()->user()->two_factor_secret)
                <svg class="icon dropdown-item-icon text-lime" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M7 17l0 .01" />
                  <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M7 7l0 .01" />
                  <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M17 7l0 .01" />
                  <path d="M14 14l3 0" />
                  <path d="M20 14l0 .01" />
                  <path d="M14 14l0 3" />
                  <path d="M14 20l3 0" />
                  <path d="M17 17l3 0" />
                  <path d="M20 17l0 3" />
                </svg>
                {{ __('QR Code') }}
              @else
                <svg class="icon dropdown-item-icon text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M7 16h-4l3.47 -4.66a2 2 0 1 0 -3.47 -1.54" />
                  <path d="M10 16v-8h4" />
                  <path d="M10 12l3 0" />
                  <path d="M17 16v-6a2 2 0 0 1 4 0v6" />
                  <path d="M17 13l4 0" />
                </svg>
                {{ __('2FA Autorization') }}
              @endif
            </button>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#">
              <svg class="icon dropdown-item-icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
              </svg>
              {{ __('Logout') }}
            </a>
          </div>
        </div>
      @endauth
    </div>
  </div>
</header>
<!-- topbar End -->
