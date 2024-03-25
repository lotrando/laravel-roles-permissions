  <header class="navbar navbar-expand-md d-print-none">
    <div class="container-fluid">
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-menu" type="button" aria-controls="navbar-menu" aria-expanded="false"
        aria-label="Toggle navigation">
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
            <div class="d-none d-md-flex">
              <a class="nav-link hide-theme-dark px-0" data-bs-toggle="tooltip" data-bs-placement="bottom" href="?theme=dark" title="Tmavý vzhled">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                </svg>
              </a>
              <a class="nav-link hide-theme-light px-0" data-bs-toggle="tooltip" data-bs-placement="bottom" href="?theme=light" title="Světlý vzhled">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                  <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                </svg>
              </a>
            </div>
            @guest
              <a class="btn hover-shadow-sm" href="{{ route('login') }}" rel="noreferrer">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon text-success px-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="5" y="11" width="14" height="10" rx="2">
                    </rect>
                    <circle cx="12" cy="16" r="1"></circle>
                    <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                  </svg>
                </span>
                {{ __('Login') }}
              </a>
            @endguest
          </div>
        </div>
        @auth
          {{-- User Dropdown --}}
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
            {{-- User Dropdown Menu End --}}
          </div>
          {{-- User Dropdown End --}}
        @endauth
      </div>
    </div>
  </header>
