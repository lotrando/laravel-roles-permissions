@role(['user|supervisor|admin'])
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
                      <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Roles') }}
                    </span>
                  </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'permissions' ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('permissions') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg class="icon icon-tabler icons-tabler-outline icon-tabler-fingerprint text-yellow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
              @endrole
              @role('admin')
                {{-- Optional Dropdown menu --}}
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block text-red">
                      <svg class="icon icon-tabler icons-tabler-outline icon-tabler-settings text-teal" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                          d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Administration
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item {{ request()->segment(1) == 'users' ? 'active' : '' }}" href="{{ route('users') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                          <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-users text-lime" width="24" height="24" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                          </span>
                        </span>
                        <span class="nav-link-title">
                          Users
                        </span>
                      </a>
                      <div class="hr-text text-muted my-3">Roles/permissions</div>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#" role="button" aria-expanded="false">
                          <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-yellow">
                              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-fingerprint text-blue" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" />
                                <path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" />
                                <path d="M12 11v2a14 14 0 0 0 2.5 8" />
                                <path d="M8 15a18 18 0 0 0 1.8 6" />
                                <path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" />
                              </svg>
                            </span>
                          </span>
                          <span class="nav-link-title">
                            User rights
                          </span>
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item {{ request()->segment(1) == 'roles' ? 'active' : '' }}" href="{{ route('roles') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                              </svg>
                            </span>
                            <span class="nav-link-title">
                              {{ __('Roles') }}
                            </span>
                          </a>
                          <a class="dropdown-item {{ request()->segment(1) == 'permissions' ? 'active' : '' }}" href="{{ route('permissions') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-list-check text-yellow" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        </div>
                      </div>
                    </div>
                  </div>
                </li> --}}
              @endrole
            </ul>
          </div>
        </div>
      </div>
    </header>
  </div>
@endrole
