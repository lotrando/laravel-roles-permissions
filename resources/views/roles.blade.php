@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/roles.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-muted-lt">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt text-red" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
            </svg>
          </span>
        </span>
        <h3 class="card-title">Roles</h3>
      </div>
      <div class="list-group list-group-flush overflow-auto" style="max-height: 30rem">
        @foreach ($roles as $role)
          <div class="list-group-item">
            <div class="row align-items-center">
              @role('admin')
                <div class="col-auto"><input class="form-check-input" type="checkbox"></div>
              @endrole
              <div class="col">
                <div class="text-secondary d-block mb-1">
                  <span class="text-azure">
                    {{ $role->name }}</span> / <span class="text-yellow">{{ $role->guard_name }}
                  </span>
                </div>
                @foreach ($role->permissions as $permission)
                  <span class="badge text-lime">{{ $permission->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
