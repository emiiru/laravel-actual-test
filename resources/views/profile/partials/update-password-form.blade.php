<section>
    @if (session('status') === 'password-updated')
        <div class="alert alert-success" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ __('Password updated.') }}
        </div>
    @endif

    <div class="alert alert-light border d-flex align-items-start gap-2" role="note">
        <i class="bi bi-info-circle mt-1"></i>
        <div>
            <div class="fw-semibold">Tip</div>
            <div class="small text-body-secondary">Use a long password (12+ characters) and avoid reusing it elsewhere.</div>
        </div>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}"
                autocomplete="current-password"
            />
            @if ($errors->updatePassword->has('current_password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->has('password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-key me-1"></i> {{ __('Save') }}
        </button>
    </form>
</section>
