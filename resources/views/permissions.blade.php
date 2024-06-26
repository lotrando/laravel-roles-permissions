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
            {{ __('Roles') }}
          </div>
          {{-- Page title --}}
          <h2 class="page-title text-blue h2">
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
            {{ __('Permissions') }}
          </h2>
        </div>
        {{-- Page title actions --}}
        <div class="d-print-none col-auto ms-auto">
          {{-- Buttons --}}
          <div class="btn-list">
            @role('admin')
              <button class="btn btn-lime d-none d-sm-inline-block" id="createButton" data-bs-toggle="modal" data-bs-target="#createModal">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                  <path d="M15 12h-6" />
                  <path d="M12 9v6" />
                </svg>
                {{ __('New') }}
              </button>
            @endrole
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page')
  <div class="col-12">
    <div class="card p-0 shadow-sm">
      <div class="card-body p-2">
        <div class="d-block col mb-1">
          <form method="get" autocomplete="off" novalidate="">
            <div class="input-icon">
              <span class="input-icon-addon">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                  <path d="M21 21l-6 -6"></path>
                </svg>
              </span>
              <input class="form-control" id="searchBox" name="searchbox" type="text" value="" aria-label="Search on page" placeholder="{{ __('Search…') }}">
            </div>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table-vcenter card-table table" id="Table">
            <thead>
              <tr>
                <th class="bg-muted-lt">{{ __('Permission Name') }}</th>
                <th class="bg-muted-lt">{{ __('Guard Name') }}</th>
                <th class="bg-muted-lt">{{ __('Created') }}</th>
                <th class="bg-muted-lt">{{ __('Updated') }}</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modals')
  {{-- Create Modal --}}
  <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-modal="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="createForm">
          @csrf
          <div class="modal-header bg-lime-lt">
            <h5 class="modal-title"></h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
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
              <input class="form-control @error('permission_name') is-invalid is-invalid-lite @enderror" id="permission_name" name="permission_name" type="text"
                value="" placeholder="{{ __('e.g. post create') }}">
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <input id="action" type="hidden">
            <input id="item-id" type="hidden">
            <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
            @role('admin')
              <button class="btn btn-danger" id="deleteButton" type="button"></button>
            @endrole
            @role('modarator|admin')
              <button class="btn btn-primary" id="submitButton" type="submit"></button>
            @endrole
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- Delete Modal --}}
  <div class="modal modal-sm modal-blur fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-status bg-danger"></div>
        {{-- <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button> --}}
        <div class="modal-body py-4 text-center">
          <svg class="icon text-danger icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 9v4"></path>
            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
            <path d="M12 16h.01"></path>
          </svg>
          <h3>{{ __('Do you really want to remove this permission ?') }}</h3>
          <div class="text-red mt-2">
            {{ __('What you\'ve done cannot be undone.') }}
          </div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col">
                <button class="btn w-100" data-bs-dismiss="modal">
                  {{ __('Cancel') }}
                </button>
              </div>
              <div class="col">
                <button class="btn btn-danger w-100" id="deleteSubmit">
                  {{ __('Delete') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {

      // Toastr options
      toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
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

      // Datatable
      var myTable = new DataTable('#Table', {
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
        deferRender: true,
        searchHighlight: true,
        scroller: false,
        language: {
          url: "{{ asset('libs/datatables/js/cs.json') }}",
        },
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
          data: function(data) {},
          complete: function(response) {}
        },
        columns: [{
            data: 'name',
            "className": 'text-yellow',
            'width': '75%',
          },
          {
            data: 'guard_name',
            "className": 'text-lime',
            'width': '5%',
            orderable: false,
            searchable: false
          },
          {
            data: 'created_at',
            'width': '8%',
            render: function(data, type, full, meta) {
              return moment(data).locale($('html').attr('lang')).format('DD.MMMM.YYYY')
            }
          },
          {
            data: 'updated_at',
            'width': '8%',
            render: function(data, type, full, meta) {
              return moment(data).locale($('html').attr('lang')).format('DD.MMMM.YYYY')
            }
          }
        ]
      });

      // Edit form after click datatable row
      myTable.on('click', 'tbody tr', function() {
        var data = myTable.row(this).data();
        $('#action').val('Update')
        $('#permission_name').val(data.name)
        $('#item-id').val(data.id)
        $('#deleteButton').text("{{ __('Delete') }}")
        $('#submitButton').text("{{ __('Update') }}")
        $('#createModal .modal-title').text("{{ __('Edit permission') }}")
        $('#createModal .modal-header').removeClass('bg-lime-lt').addClass('bg-yellow-lt')
        $('#deleteButton').show()
        $('#createModal').modal('show')
      });

      // Datatable custom search box
      $('#searchBox').on('keyup', function() {
        myTable.search($(this).val()).draw()
      });

      // New button
      $('#createButton').on('click', function() {
        $('#deleteButton').hide()
        $('#createForm')[0].reset()
        $('#createModal .modal-title').text("{{ __('Create permission') }}")
        $('#createModal .modal-header').removeClass('bg-purple-lt').addClass('bg-lime-lt')
        $('#submitButton').html("{{ __('Create') }}")
        $('#action').val('Create')
      });

      // Delete button
      $('#deleteButton').on('click', function() {
        $('#createModal').modal('hide')
        $('#deleteModal').modal('show')
      });

      // Delete confirm button - click delete item
      $('#deleteSubmit').click(function() {
        var id = $('#item-id').val()
        var action = $('#action').val()
        $.ajax({
          url: "permission/destroy/" + id,
          beforeSend: function() {
            $('#buttonSpinner').show();
            $('#deleteSubmit').addClass('btn-loading').attr('disabled', true)
            setTimeout(function() {
              $('#deleteSubmit').removeClass('btn-loading').removeAttr('disabled')
            }, 2000)
          },
          success: function(data) {
            if (data.error) {
              toastr.error(data.error)
              setTimeout(function() {
                $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
              }, 1000);
            } else {
              if (data.success) {
                $('#createModal').modal('hide')
                toastr.success(data.success)
                setTimeout(function() {
                  $('#deleteModal').modal('hide')
                  $('#deleteSubmit').removeClass('btn-loading').removeAttr('disabled')
                }, 2000);
                myTable.draw()
              }
            }
          },
          error: function(xhr, status, error) {
            toastr.error(error)
          }
        })
      });

      // Create / Edit Form
      $('#createForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var type = $('#action').val()

        if (type == 'Create') {
          var action = 'permission/store';
          var method = 'POST';
          var modalClose = false
        }
        if (type == 'Update') {
          var id = $('#item-id').val()
          var action = 'permission/update/' + id;
          var method = 'POST';
          var modalClose = true
        }

        $.ajax({
          url: action,
          type: method,
          token: "{{ csrf_token() }}",
          data: form.serialize(),
          dataType: 'json',
          beforeSend: function() {
            $('#buttonSpinner').show();
            $('#submitButton').addClass('btn-loading').attr('disabled', true);
            setTimeout(function() {
              $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
            }, 1000)
          },
          success: function(data) {
            if (data.errors) {
              for (var key = 0; key < data.errors.length; key++) {
                toastr.error(data.errors[key])
              }
              setTimeout(function() {
                $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
              }, 1000);
            } else {
              if (data.success) {
                toastr.success(data.success)
                setTimeout(function() {
                  $('#submitButton').removeClass('btn-loading').removeAttr('disabled');
                  if (modalClose == true) {
                    $('#createModal').modal('hide')
                  }
                }, 1000);
                myTable.draw()
              }
            }
          },
          error: function(xhr, status, error) {
            toastr.error(error)
          }
        });
      });
    });
  </script>
@endpush
