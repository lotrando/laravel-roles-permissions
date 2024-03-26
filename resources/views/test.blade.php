@extends('layout.template')
@push('header')
  <!-- Additional CSS -->
  <link href="{{ asset('libs/toastr/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('libs/datatables/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <link href="{{ asset('libs/datatables/css/fixedHeader.dataTables.min.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link type="image/png" href="{{ asset('img/favicons/roles.png') }}" rel="shortcut icon">
@endpush
@push('style')
  <!-- Style -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

    :root {
      --tblr-font-sans-serif: 'Ubuntu', sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
      background-image: url('../img/blue.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      back`
    }
  </style>
@endpush
@section('modals')
  <!-- Modals -->
@endsection
@push('scripts')
  <!-- Additional scripts -->
  <script src="{{ asset('libs/toastr/toastr.min.js') }}" defer></script>
  <script src="{{ asset('libs/moment/moment-with-locales.min.js') }}" defer></script>
  <script src="{{ asset('libs/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('libs/datatables/js/dataTables.fixedHeader.min.js') }}"></script>
  <script src="{{ asset('libs/datatables/js/dataTables.scroller.min.js') }}"></script>
@endpush
