  <header class="navbar navbar-expand-md d-print-none">
    <div class="container-fluid">
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-menu" type="button" aria-controls="navbar-menu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand d-none-navbar-horizontal pe-md-3 pe-0">
        <a href="{{ route('home') }}">
          <img class="navbar-brand-image" src="{{ asset('img/logo.png') }}" alt="Intranet KHN" width="50" height="32">
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
                <div class="small text-muted">{{ Auth::user()->personal_number ?? '' }}</div>
              </div>
              @if (strlen(Auth::user()->avatar) == 2)
                <span class="avatar avatar-sm ms-2">{{ Auth::user()->avatar }}</span>
              @else
                <span class="avatar avatar-sm ms-2" style="background-image: url({{ asset('foto/' . Auth::user()->avatar) }})"></span>
              @endif
            </a>
            {{-- User Dropdown Menu --}}
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#settings-modal" href="#">
                <svg class="icon dropdown-item-icon text-muted" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                  <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                </svg>
                {{ __('Settings') }}
              </a>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout-modal" href="#">
                <svg class="icon dropdown-item-icon text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
