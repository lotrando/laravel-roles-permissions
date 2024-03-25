  {{-- Logout Modal --}}
  <div class="modal modal-sm modal-blur fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow-lg">
        <div class="modal-status bg-danger"></div>
        <div class="modal-body py-4 text-center">
          <svg class="icon icon-tabler icon-tabler-logout icon-lg text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 9v4" />
            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
            <path d="M12 16h.01" />
          </svg>
          <h3 class="text-red">{{ __('Are you sure?') }}</h3>
          <div class="text-muted">{{ __('Do you really want to logout?') }}</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a class="btn w-100" data-bs-dismiss="modal" href="#">
                  {{ __('Cancel') }}
                </a></div>
              <div class="col">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-danger w-100" data-bs-dismiss="modal" type="submit" type="button">
                    {{ __('Logout') }}
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Logout Modal End --}}
