<section>
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ __('Profile updated.') }}
        </div>
    @endif

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="profileName" class="form-label">{{ __('Name') }}</label>
            <input
                id="profileName"
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">This name will be visible across your account.</div>
        </div>

        <div class="mb-3">
            <label for="profileEmail" class="form-label">{{ __('Email') }}</label>
            <input
                id="profileEmail"
                name="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">We’ll use this email for account-related notifications.</div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <div class="alert alert-warning py-2 mb-2" role="alert">
                        <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                            <div>
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                {{ __('Your email address is unverified.') }}
                            </div>
                            <button type="submit" form="send-verification" class="btn btn-sm btn-outline-dark">
                                <i class="bi bi-send me-1"></i> {{ __('Resend') }}
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-info py-2 mb-0" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check2 me-1"></i> {{ __('Save') }}
        </button>
    </form>
</section>
