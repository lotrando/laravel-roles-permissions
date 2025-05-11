<div class="sticky-top">
  <header class="navbar-expand-md">
    <div class="navbar-collapse collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->segment(1) == 'home' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('home') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'home' ? 'text-azure' : '' }}">
                  <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                  </svg>
                </span>
                <span class="nav-link-title">
                  {{ __('Home') }}
                </span>
              </a>
            </li>
            @can('show user')
              <li class="nav-item {{ request()->segment(1) == 'users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'users' ? 'text-lime' : '' }}">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                      <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Users') }}
                  </span>
                </a>
              </li>
            @endcan
            @can('show role')
              <li class="nav-item {{ request()->segment(1) == 'roles' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'roles' ? 'text-red' : '' }}">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                    </svg>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Roles') }}
                  </span>
                </a>
              </li>
            @endcan
            @can('show permission')
              <li class="nav-item {{ request()->segment(1) == 'permissions' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('permission.index') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block {{ request()->segment(1) == 'permissions' ? 'text-yellow' : '' }}">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-fingerprint" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3"></path>
                      <path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6"></path>
                      <path d="M12 11v2a14 14 0 0 0 2.5 8"></path>
                      <path d="M8 15a18 18 0 0 0 1.8 6"></path>
                      <path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95"></path>
                    </svg>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Permissions') }}
                  </span>
                </a>
              </li>
            @endcan
          </ul>
        </div>
      </div>
    </div>
  </header>
</div>
