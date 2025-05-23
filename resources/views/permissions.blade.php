@extends('layout.app')

@section('favicon')
  <link type="image/svg" href="{{ asset('img/favicons/permissions.svg') }}" rel="shortcut icon">
@endsection

@section('page-header')
  <div class="page-header d-print-none">
    <div class="container-fluid">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title h2">
            <span class="nav-link-icon d-inline-block">
              <svg class="icon text-yellow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
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
        <div class="d-print-none col-auto ms-auto">
          <div class="btn-list">
            @can('create permission')
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
        <table class="table-vcenter card-table table-hover table" id="permissionTable">
          <thead>
            <tr>
              <th class="bg-muted-lt">{{ __('Permission name') }}</th>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="createForm">
          @csrf
          <div class="modal-header bg-lime-lt">
            <h5 class="modal-title"></h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="form-label">{{ __('Permission name') }}</label>
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
              <input class="form-control @error('permission_name') is-invalid is-invalid-lite @enderror" id="permission_name" name="permission_name" type="text" value=""
                placeholder="{{ __('e.g. post create') }}">
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <input id="action" type="hidden">
            <input id="item-id" type="hidden">
            <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
            @can('delete permission')
              <button class="btn btn-danger" id="deleteButton" type="button">{{ __('Delete') }}</button>
            @endcan
            @can('create permission')
              <button class="btn btn-lime" id="submitCreateButton" type="submit">{{ __('Create') }}</button>
            @endcan
            @can('edit permission')
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
        <div class="modal-body py-4 text-center">
          <svg class="icon text-danger icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 9v4"></path>
            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
            <path d="M12 16h.01"></path>
          </svg>
          <h3>{{ __('Do you really want to remove this permission?') }}</h3>
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

      // Permissions datatable
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
          type: 'GET',
          url: "{{ route('permission.index') }}",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          contentType: 'application/json; charset=utf-8',
          data: function(data) {},
          complete: function(response) {}
        },
        columns: [{
            data: 'name',
            className: 'text-yellow',
            width: 'auto',
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

      // Datatable custom search box
      $('#searchBox').on('keyup', function() {
        myTable.search($(this).val()).draw()
      });

      // Datatable row click event
      myTable.on('click', 'tbody tr', function() {
        var data = myTable.row(this).data();
        $('#action').val('Update')
        $('#permission_name').val(data.name)
        $('#item-id').val(data.id)
        $('#submitCreateButton').hide()
        $('#submitUpdateButton, #deleteButton').show()
        $('#createModal .modal-title').text("{{ __('Edit permission') }}")
        $('#createModal .modal-header').removeClass('bg-lime-lt').addClass('bg-yellow-lt')
        $('#createModal').modal('show')
      });

      // Create new button event
      $('#createButton').on('click', function() {
        $('#createForm')[0].reset()
        $('#createModal .modal-title').text("{{ __('Create permission') }}")
        $('#createModal .modal-header').removeClass('bg-purple-lt').addClass('bg-lime-lt')
        $('#deleteButton').hide()
        $('#submitCreateButton').show()
        $('#submitUpdateButton').hide()
        $('#action').val('Create')
      });

      // Create / Edit Form
      $('#createForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var type = $('#action').val()
        var id = $('#item-id').val()

        if (type == 'Create') {
          var action = 'permission/store';
          var modalClose = false
        }
        if (type == 'Update') {
          var action = 'permission/update/' + id;
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
            $('#submitCreateButton, #submitUpdateButton').addClass('btn-loading').attr('disabled', true);
            setTimeout(function() {
              $('#submitCreateButton, #submitUpdateButton').removeClass('btn-loading').removeAttr('disabled');
            }, 1000)
          },
          success: function(data) {
            if (data.errors) {
              for (var key = 0; key < data.errors.length; key++) {
                toastr.error(data.errors[key])
              }
              setTimeout(function() {
                $('#submitCreateButton, #submitUpdateButton').removeClass('btn-loading').removeAttr('disabled');
              }, 1000);
            } else {
              if (data.success) {
                toastr.success(data.success)
                setTimeout(function() {
                  $('#submitCreateButton, #submitUpdateButton').removeClass('btn-loading').removeAttr('disabled');
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

      // Delete button and delete modal show
      $('#deleteButton').on('click', function() {
        $('#createModal').modal('hide')
        $('#deleteModal').modal('show')
      });

      // Delete confirm button -> click delete item
      $('#deleteSubmit').click(function() {
        var id = $('#item-id').val()
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
                }, 1000);
                myTable.draw()
              }
            }
          },
          error: function(xhr, status, error) {
            toastr.error(error)
          }
        })
      });

    });
  </script>
@endpush
