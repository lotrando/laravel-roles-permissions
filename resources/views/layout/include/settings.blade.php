  {{-- Settings Modal --}}
  <div class="modal modal-lg modal-blur fade" id="settings-modal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info-lt">
          <h5 class="modal-title">{{ __('Settings') }}</h5>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="card border-0">
            <div class="row g-0">
              <div class="col-12 d-flex flex-column">
                <div class="card-body">
                  <h2 class="mb-4">{{ __('Employee number') }} {{ Auth::user()->personal_number ?? '' }}</h2>
                  <div class="row align-items-center">
                    <div class="col-auto mb-3"><span class="avatar avatar-xl" style="background-image: url(../../foto/{{ Auth::user()->avatar ?? '' }})"></span>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-md">
                      <div class="form-label">{{ __('Personal number') }}</div>
                      <input class="form-control" type="text" value="{{ Auth::user()->personal_number ?? '' }}" readonly>
                    </div>
                    <div class="col-md">
                      <div class="form-label">{{ __('Last name') }} {{ __('First name') }}</div>
                      <input class="form-control" type="text" value="{{ Auth::user()->name ?? '' }}">
                    </div>
                  </div>
                  <h3 class="card-title mt-4">{{ __('Email address') }}</h3>
                  <p class="card-subtitle">{{ __('Emailovou adresu vyplňte pouze pokud máte přidělenou firemní adresu s příponou @khn.cz') }}</p>
                  <div>
                    <div class="row g-2">
                      <div class="col-md">
                        <input class="form-control" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <h3 class="card-title mt-4">{{ __('Password') }}</h3>
                  <p class="card-subtitle">{{ __('Změnte si svoje heslo do intranetu.') }}</p>
                  <div>
                    <div class="row g-2">
                      <div class="col-md">
                        <label class="form-label">
                          {{ __('Password') }}
                        </label>
                        <input class="form-control" type="password" value="">
                      </div>
                      <div class="col-md">
                        <label class="form-label">
                          {{ __('Password confirmation') }}
                        </label>
                        <input class="form-control" type="password" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
          <button class="btn btn-primary" data-bs-dismiss="modal" type="button">{{ __('Save') }}</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Settings Modal End --}}
