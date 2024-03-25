@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/users.png') }}" rel="shortcut icon">
@endsection

@section('page')
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-muted-lt">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icons-tabler-outline icon-tabler-users text-lime" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
          </svg>
        </span>
        <h3 class="card-title">Users</h3>
      </div>
      <div class="list-group list-group-flush overflow-auto" style="max-height: 30rem">
        @foreach ($users as $key => $user)
          <div class="list-group-header sticky-top">{{ $key }}</div>
          @foreach ($user as $item)
            <div class="list-group-item">
              <div class="row align-items-center">
                @role('admin')
                  <div class="col-auto"><input class="form-check-input" type="checkbox"></div>
                @endrole
                <div class="col-auto">
                  <span class="avatar" style="background-image: url({{ asset('img/avatar.png') }})"></span>
                </div>
                <div class="col">
                  <span class="text-body d-block mb-1">{{ $item->name }}</span>
                  <div class="text-secondary mt-n1">{{ $item->email }}</div>
                </div>
              </div>
            </div>
          @endforeach
        @endforeach
      </div>
    </div>
  </div>
@endsection
