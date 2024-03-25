<div class="sticky-top">
  <header class="navbar-expand-md">
    <div class="navbar-collapse collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->segment(1) == 'home' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('home') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
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
            @role(['user|supervisor|admin'])
              <li class="nav-item {{ request()->segment(1) == 'users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-users text-lime" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            @endrole
            @role(['supervisor|admin'])
              <li class="nav-item {{ request()->segment(1) == 'roles' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roles') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-masks-theater text-pink" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M13.192 9h6.616a2 2 0 0 1 1.992 2.183l-.567 6.182a4 4 0 0 1 -3.983 3.635h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183z" />
                      <path d="M15 13h.01" />
                      <path d="M18 13h.01" />
                      <path d="M15 16.5c1 .667 2 .667 3 0" />
                      <path d="M8.632 15.982a4.037 4.037 0 0 1 -.382 .018h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183h6.616a2 2 0 0 1 2 2" />
                      <path d="M6 8h.01" />
                      <path d="M9 8h.01" />
                      <path d="M6 12c.764 -.51 1.528 -.63 2.291 -.36" />
                    </svg>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Roles') }}
                  </span>
                </a>
              </li>
            @endrole
            @role('admin')
              <li class="nav-item {{ request()->segment(1) == 'permissions' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('permissions') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-list-check text-yellow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                      <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                      <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                      <path d="M11 6l9 0" />
                      <path d="M11 12l9 0" />
                      <path d="M11 18l9 0" />
                    </svg>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Permissions') }}
                  </span>
                </a>
              </li>
            @endrole
            {{-- Optional Dropdown menu --}}
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#" role="button" aria-expanded="false">
                <span class="nav-link-icon d-md-none d-lg-inline-block text-red">
                  <svg class="icon icon-tabler icons-tabler-outline icon-tabler-circle-number-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M10 10l2 -2v8" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Dropdown 1
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-column">
                  <a class="dropdown-item" href="#">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg class="icon icon-tabler icons-tabler-outline icon-tabler-circle-number-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                          <path d="M10 10l2 -2v8" />
                        </svg>
                      </span>
                    </span>
                    <span class="nav-link-title">
                      Item 1
                    </span>
                  </a>
                  <div class="hr-text text-muted my-3">Divider</div>
                  <div class="dropend">
                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#" role="button" aria-expanded="false">
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <span class="nav-link-icon d-md-none d-lg-inline-block text-yellow">
                          <svg class="icon icon-tabler icons-tabler-outline icon-tabler-circle-number-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M10 8h3a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3" />
                          </svg>
                        </span>
                      </span>
                      <span class="nav-link-title">
                        Dropdown 2
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                          <svg class="icon icon-tabler icons-tabler-outline icon-tabler-circle-number-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M10 8h3a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3" />
                          </svg>
                        </span>
                        <span class="nav-link-title">
                          Item 2
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li> --}}
          </ul>

          <div class="d-none d-lg-block col-auto">
            <div class="my-md-0 flex-grow-1 flex-md-grow-0 order-md-last order-first my-2">
              <form action="./" method="get" autocomplete="off" novalidate="">
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                      <path d="M21 21l-6 -6"></path>
                    </svg>
                  </span>
                  <input class="form-control" type="text" value="" aria-label="Search in website" placeholder="Search…">
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </header>
</div>
