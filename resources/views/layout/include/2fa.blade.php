<!-- Modal pro 2FA QR kód -->
<div class="modal fade" id="twoFactorQrModal" aria-labelledby="twoFactorQrModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-lime-lt">
        <h5 class="modal-title">{{ __('User Two factor autentication settings') }}</h5>
        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        @auth
          @if (auth()->user()->two_factor_secret)
            <p>{{ __('Scan this QR code with your two-factor authentication app.') }}</p>
            <div style="display:inline-block; background:#fff; padding:16px; border-radius:8px; box-shadow:0 0 8px #a8a8a8;">
              {!! auth()->user()->twoFactorQrCodeSvg() !!}
            </div>
            <p class="mt-3">{{ __('Recovery codes:') }}</p>
            <ul class="list-unstyled">
              @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                <li><code>{{ $code }}</code></li>
              @endforeach
            </ul>
          @else
            <p class="text-yellow" role="alert">
              {{ __('Two-factor authentication is not enabled.') }}
            </p>
          @endif
        @endauth
      </div>
      <div class="modal-footer">
        <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
        @auth
          @if (!auth()->user()->two_factor_secret)
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
              @csrf
              <button class="btn btn-lime" type="submit">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M16 9a3 3 0 1 1 -3 3l.005 -.176a3 3 0 0 1 2.995 -2.824" />
                  <path d="M16 5a7 7 0 0 1 0 14h-8a7 7 0 0 1 0 -14zm0 2h-8a5 5 0 1 0 0 10h8a5 5 0 0 0 0 -10" />
                </svg>
                {{ __('Enable') }}
              </button>
            </form>
          @else
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M16 9a3 3 0 1 1 -3 3l.005 -.176a3 3 0 0 1 2.995 -2.824" />
                  <path d="M16 5a7 7 0 0 1 0 14h-8a7 7 0 0 1 0 -14zm0 2h-8a5 5 0 1 0 0 10h8a5 5 0 0 0 0 -10" />
                </svg>
                {{ __('Disable') }}
              </button>
            </form>
          @endif
        @endauth
      </div>
    </div>
  </div>
</div>
