@extends('layout.app')

@section('favicon')
  <link type="image/png" href="{{ asset('img/favicons/permissions.png') }}" rel="shortcut icon">
@endsection

@section('page-header')
  {{-- Page header --}}
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          {{-- Page pre-title --}}
          <div class="page-pretitle">

          </div>
          {{-- Page title --}}
          <h2 class="page-title text-blue h2">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-list-check text-yellow" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                <path d="M11 6l9 0"></path>
                <path d="M11 12l9 0"></path>
                <path d="M11 18l9 0"></path>
              </svg>
            </span>
            Permission
          </h2>
        </div>
        {{-- Page title actions --}}
        <div class="d-print-none col-auto ms-auto">
          {{-- Buttons --}}
          <div class="btn-list">
            <button class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#createModal">
              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-plus" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                <path d="M15 12h-6" />
                <path d="M12 9v6" />
              </svg>
              {{ __('Create') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page')
  <div class="col-12">
    <div class="card px-1">
      <div class="table-responsive">
        <table class="table-vcenter card-table table" id="permissionTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Permission Name</th>
              <th>Permission Guard Name</th>
              <th>Created_at</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('modals')
  {{-- Create Modal --}}
  <div class="modal modal-blur fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-modal="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="createForm" action="{{ route('permission.create') }}" method="POST">
          @csrf
          <div class="modal-header bg-lime-lt">
            <h5 class="modal-title">{{ 'Create permission' }}</h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-forms" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3" />
                  <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3" />
                  <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7" />
                  <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1" />
                  <path d="M17 12h.01" />
                  <path d="M13 12h.01" />
                </svg>
              </span>
              <input class="form-control @error('permission_name') is-invalid is-invalid-lite @enderror"" id="name" name="permission_name" type="text" value=""
                placeholder="Permission name">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
            <button class="btn btn-primary" id="submitButton" type="submit">{{ __('Save') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- Delete Modal --}}
  <div class="modal modal-sm modal-blur fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="" method="post">
        <div class="modal-content">
          <div class="modal-status bg-danger"></div>
          <div class="modal-body py-4 text-center">
            <svg class="icon text-danger icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
              stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 9v4"></path>
              <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
              <path d="M12 16h.01"></path>
            </svg>
            <h3>{{ __('Do you really want to remove this permission ?') }}</h3>
            <span class="badge badge-outline badge-yellow" id="permissionName"></span>
            <div class="text-red mt-3">
              {{ __('What you\'ve done cannot be undone.') }}
            </div>
          </div>
          <div class="modal-footer">
            <input id="permissionId" name="permission_id" type="hidden" value="">
            <div class="w-100">
              <div class="row">
                <div class="col">
                  <button class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                  </button>
                </div>
                <div class="col">
                  <button class="btn btn-danger w-100 delete-button" data-bs-dismiss="modal">
                    Delete item
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {

      toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "500",
        "hideDuration": "500",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      $('#createForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var actionType = form.attr('method');

        $.ajax({
          type: actionType,
          url: actionUrl,
          token: "{{ csrf_token() }}",
          data: form.serialize(),
          dataType: 'json',
          beforeSend: function() {
            $('#buttonSpinner').show();
            $('#submitButton').addClass('btn-loading').attr('disabled', 'disabled');
            setTimeout(function() {
              $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
            }, 1000)
          },
          success: function(data) {
            if (data.errors) {
              for (var count = 0; count < data.errors.length; count++) {
                toastr.error(data.errors[count])
                setTimeout(function() {
                  $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
                }, 2000);
              }
            } else {
              if (data.success) {
                toastr.success(data.success)
                setTimeout(function() {
                  $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
                  $('#createModal').modal('hide')
                  $('#createForm')[0].reset()
                }, 2000);
                myTable.draw()
              }
            }
          },
          error: function(xhr, status, error) {
            toastr.error(error)
          }
        });
      });

      var myTable = new DataTable('#permissionTable', {
        dom: 'lrt',
        paging: true,
        serverSide: true,
        processing: true,
        stateSave: true,
        pageSave: true,
        pageLength: -1,
        lengthChange: false,
        responsive: true,
        fixedHeader: true,
        scrollY: 480,
        language: {
          url: "{{ asset('libs/datatables/js/cs.json') }}",
        },
        deferRender: true,
        searchHighlight: true,
        scroller: false,
        order: [
          [0, "desc"]
        ],
        ajax: {
          type: "GET",
          url: "{{ route('permissions') }}",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          contentType: 'application/json; charset=utf-8',
          data: function(data) {
            console.log(data);
          },
          complete: function(response) {
            console.log(response);
          }
        },
        columns: [{
            data: 'id',
            "width": "1%",
          },
          {
            data: 'name',
            "width": "70%",
          },
          {
            data: 'guard_name',
            "width": "5%",
          },
          {
            data: 'created_at',
            "width": "5%",
            render: function(data, type, full, meta) {
              var date = moment(data).locale('cs');
              return date.format('DD.MM.YYYY');
            }
          },
          {
            data: 'buttons',
            "width": "3%",
            orderable: false,
            searchable: false
          }
        ]
      });

      $('.delete').on('click', function() {
        alert('Test')
      });

      $('#searchBox').on('keyup', function() {
        myTable.search($(this).val()).draw();
      });


    });
  </script>
@endpush
