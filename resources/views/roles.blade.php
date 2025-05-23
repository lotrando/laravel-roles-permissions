@extends('layout.app')

@section('favicon')
  <link type="image/svg" href="{{ asset('img/favicons/roles.svg') }}" rel="shortcut icon">
@endsection

@section('page-header')
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title h2">
            <span class="icon-demo-message-icon d-inline-block">
              <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt text-red" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
              </svg>
            </span>
            {{ __('Roles') }}
          </h2>
        </div>
        <div class="d-print-none col-auto ms-auto">
          <div class="btn-list">
            @can('create role')
              @include('layout.partials.create-button')
            @endcan
            <div class="d-block col-auto">
              @include('layout.partials.search-form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page')
  <div class="col-12">
    <div class="card px-1 shadow-sm" data-aos="fade-up">
      <div class="table-responsive">
        <table class="table-vcenter card-table table" id="rolesTable">
          <thead>
            <tr>
              <th class="bg-muted-lt">{{ __('Role name') }}</th>
              <th class="bg-muted-lt">{{ __('Role permissions') }}</th>
              <th class="bg-muted-lt">{{ __('Guard name') }}</th>
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
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="createForm">
          @csrf
          <div class="modal-header bg-lime-lt">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-shirt text-red" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0"></path>
                </svg>
              </span>
              <input class="form-control @error('role_name') is-invalid is-invalid-lite @enderror" id="role_name" name="role_name" type="text" value=""
                placeholder="{{ __('e.g. supervisor') }}">
              </label>
            </div>
            <div class="mb-3">
              <div class="form-label">{{ __('Select permissions for this role') }}</div>
              <select class="form-select" id="permissions" name="permissions[]" multiple="multiple">
                @foreach ($permissions as $permission)
                  <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
              </select>
            </div>
            <button class="btn me-auto" id="select-all">{{ __('select all') }}</button>
            <button class="btn me-auto" id="deselect-all">{{ __('deselect all') }}</button>
          </div>
          <div class="modal-footer">
            <input id="action" type="hidden">
            <input id="item-id" type="hidden">
            <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
            @can('delete role')
              <button class="btn btn-danger" id="deleteButton" type="button">{{ __('Delete') }}</button>
            @endcan
            @can('create role')
              <button class="btn btn-lime" id="submitCreateButton" type="submit">{{ __('Create') }}</button>
            @endcan
            @can('edit role')
              <button class="btn btn-yellow" id="submitUpdateButton" type="submit">{{ __('Update') }}</button>
            @endcan
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
      $.ajax({
        url: "{{ asset('libs/toastr/toastr.config.json') }}",
        success: function(data) {
          return toastr.options = data
        }
      });

      // Multiple select
      $('#permissions').multiSelect({
        keepOrder: true
      });

      // Select all
      $('#select-all').click(function() {
        $('#permissions').multiSelect('select_all');
        return false;
      });

      // Deselect all
      $('#deselect-all').click(function() {
        $('#permissions').multiSelect('deselect_all');
        return false;
      });

      // Roles datatable
      var myTable = new DataTable('#rolesTable', {
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
        scrollY: 550,
        deferRender: true,
        searchHighlight: true,
        scroller: false,
        language: {
          url: "{{ asset('libs/datatables/js/' . app()->getLocale() . '.json') }}",
        },
        order: [
          [0, "asc"]
        ],
        ajax: {
          type: "GET",
          url: "{{ route('role.index') }}",
          token: "{{ csrf_token() }}",
          dataType: "json",
          contentType: 'application/json; charset=utf-8',
          data: function(data) {
            console.log(data)
          },
          complete: function(response) {
            console.log(response)
          }
        },
        "createdRow": function(row, data, dataIndex) {
          if (data.id == 1) {
            $(row).addClass('bg-red-lt');
          }
        },
        columns: [{
            data: 'name',
            className: 'text-red',
            width: "10%",
          },
          {
            data: 'permissions[]',
            className: 'text-yellow',
            width: "auto",
            orderable: false,
            searchable: false,
            render: function(data, type, full, meta) {
              var badges = '';
              for (i = 0; i < data.length; i++) {
                badges += '<span class="badge bg-yellow-lt m-1">' + data[i].name + '</span>'
              }
              return badges;
            }
          },
          {
            data: 'guard_name',
            className: 'text-lime',
            width: '5%',
            orderable: false,
            searchable: false
          }
        ]
      });

      // Edit form after click datatable row
      myTable.on('click', 'tbody tr', function() {
        var data = myTable.row(this).data();
        $('#action').val('Edit')
        $('#role_name').val(data.name)
        $('#item-id').val(data.id)
        $('#createModal .modal-title').text("{{ __('Edit role') }}")
        $('#createModal .modal-header').removeClass('bg-lime-lt').addClass('bg-yellow-lt')
        $('#submitCreateButton').hide()
        $('#submitUpdateButton, #deleteButton').show()
        $('#createModal').modal('show')
        $('#permissions').multiSelect('deselect_all');
        var permissionNames = data.permissions.map(function(p) {
          return p.name ? p.name : p;
        });
        $('#permissions').multiSelect('select', permissionNames);
        $('#permissions').multiSelect('refresh');
      });

      // Datatable custom search box
      $('#searchBox').on('keyup', function() {
        myTable.search($(this).val()).draw()
      });

      // New button
      $('#createButton').on('click', function() {
        $('#permissions').multiSelect('deselect_all');
        $('#createForm')[0].reset()
        $('#createModal .modal-title').text("{{ __('Create role') }}")
        $('#createModal .modal-header').removeClass('bg-purple-lt').addClass('bg-lime-lt')
        $('#deleteButton').hide()
        $('#submitCreateButton').show()
        $('#submitUpdateButton').hide()
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
          url: "role/destroy/" + id,
          token: "{{ csrf_token() }}",
          beforeSend: function() {
            $('#buttonSpinner').show();
            $('#deleteSubmit').addClass('btn-loading').attr('disabled', 'disabled')
            setTimeout(function() {
              $('#deleteSubmit').removeClass('btn-loading').removeAttr('disabled')
            }, 2000)
          },
          success: function(data) {
            if (data.errors) {
              for (var count = 0; count < data.errors.length; count++) {
                toastr.error(data.errors[count])
                setTimeout(function() {
                  $('#deleteSubmit').removeClass('btn-loading').removeAttr('disabled')
                }, 2000);
              }
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
        var id = $('#item-id').val()

        if (type == 'Create') {
          var action = 'role/store';
          var modalClose = false
        }
        if (type == 'Edit') {
          var action = 'role/update/' + id;
          var modalClose = true
        }

        $.ajax({
          url: action,
          type: 'POST',
          token: "{{ csrf_token() }}",
          data: form.serialize(),
          dataType: 'json',
          beforeSend: function() {
            $('#buttonSpinner').show();
            $('#submitCreateButton').addClass('btn-loading').attr('disabled', 'disabled');
            setTimeout(function() {
              $('#submitCreateButton').removeClass('btn-loading').removeAttr('disabled');
            }, 1000)
          },
          success: function(data) {
            if (data.errors) {
              for (var count = 0; count < data.errors.length; count++) {
                toastr.error(data.errors[count])
                setTimeout(function() {
                  $('#submitCreateButton').removeClass('btn-loading').removeAttr('disabled');
                }, 1000);
              }
            } else {
              if (data.success) {
                toastr.success(data.success)
                setTimeout(function() {
                  $('#submitCreateButton').removeClass('btn-loading').removeAttr('disabled');
                  $('option:selected').removeAttr('selected');
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
