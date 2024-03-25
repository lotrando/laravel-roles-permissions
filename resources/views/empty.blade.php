@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/home.png') }}" rel="shortcut icon">
@endsection

@section('page')
  @can('edit users')
    <div class="row">
      {{ $user->getRoleNames()->pluck('name')->implode(',') }}

    </div>
  @endcan
@endsection
