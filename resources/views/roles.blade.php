@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/roles.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-pink-lt">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icons-tabler-outline icon-tabler-masks-theater text-pink" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13.192 9h6.616a2 2 0 0 1 1.992 2.183l-.567 6.182a4 4 0 0 1 -3.983 3.635h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183z"></path>
            <path d="M15 13h.01"></path>
            <path d="M18 13h.01"></path>
            <path d="M15 16.5c1 .667 2 .667 3 0"></path>
            <path d="M8.632 15.982a4.037 4.037 0 0 1 -.382 .018h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183h6.616a2 2 0 0 1 2 2"></path>
            <path d="M6 8h.01"></path>
            <path d="M9 8h.01"></path>
            <path d="M6 12c.764 -.51 1.528 -.63 2.291 -.36"></path>
          </svg>
        </span>
        <h3 class="card-title">Roles</h3>
      </div>
      <div class="list-group list-group-flush overflow-auto" style="max-height: 30rem">
        @foreach ($roles as $role)
          <div class="list-group-item">
            <div class="row align-items-center">
              <div class="col-auto"><input class="form-check-input" type="checkbox"></div>
              <div class="col-auto">
                <a href="#">
                  <span class="avatar" style="background-image: url({{ asset('img/avatar.png') }})"></span>
                </a>
              </div>
              <div class="col text-truncate">
                <div class="text-secondary d-block mb-1">Role name: <span class="text-azure">{{ $role->name }}</span></div>
                <div class="text-secondary text-truncate mt-n1">Guard name: <span class="text-yellow">{{ $role->guard_name }}</span></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
