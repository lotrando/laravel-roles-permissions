<div class="modal-header">
  <h5 class="modal-title">{{ __('Two-Factor QR Code') }}</h5>
  <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
</div>
<div class="modal-body text-center">
  @if (auth()->user()->two_factor_secret)
    <div style="display:inline-block; background:#fff; padding:16px; border-radius:8px; box-shadow:0 0 4px #ccc;">
      {!! auth()->user()->twoFactorQrCodeSvg() !!}
    </div>
    <p class="mt-3">{{ __('Recovery codes:') }}</p>
    <ul class="list-unstyled">
      @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
        <li><code>{{ $code }}</code></li>
      @endforeach
    </ul>
    <form class="mt-3" method="POST" action="{{ url('user/two-factor-authentication') }}">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger w-100" type="submit">
        {{ __('Disable Two-Factor Authentication') }}
      </button>
    </form>
  @else
    <p>{{ __('Two-factor authentication is not enabled.') }}</p>
  @endif
</div>
