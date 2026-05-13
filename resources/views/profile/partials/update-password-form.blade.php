<section>
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h5 class="mb-1">{{ __('Update Password') }}</h5>
            <p class="text-body-secondary mb-0">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>
    </div>

    @if (session('status') === 'password-updated')
        <div class="alert alert-success" role="alert">{{ __('Saved.') }}</div>
    @endif

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
