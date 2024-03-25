@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/permissions.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-muted-lt">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icons-tabler-outline icon-tabler-list-check text-yellow" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
            <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
            <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
            <path d="M11 6l9 0"></path>
            <path d="M11 12l9 0"></path>
            <path d="M11 18l9 0"></path>
          </svg>
        </span>
        <h3 class="card-title">Permissions</h3>
      </div>
      <div class="list-group list-group-flush overflow-auto" style="max-height: 30rem">
        @foreach ($permissions as $permission)
          <div class="list-group-item">
            <div class="row align-items-center">
              @role('admin')
                <div class="col-auto"><input class="form-check-input" type="checkbox"></div>
              @endrole
              <div class="col-auto">
                <span class="avatar" style="background-image: url({{ asset('img/avatar.png') }})"></span>
              </div>
              <div class="col text-truncate">
                <div class="text-secondary d-block mb-1"><span class="text-azure">{{ $permission->name }}</span> / <span class="text-yellow">{{ $permission->guard_name }}</span>
                </div>
                <div class="col text-truncate">
                  @foreach ($permission->roles as $role)
                    <span class="badge text-lime">{{ $role->name }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
