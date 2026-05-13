<section>
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h5 class="mb-1">{{ __('Profile Information') }}</h5>
            <p class="text-body-secondary mb-0">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </div>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success" role="alert">{{ __('Saved.') }}</div>
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

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <div class="alert alert-warning py-2 mb-2" role="alert">
                        {{ __('Your email address is unverified.') }}
                        <button type="submit" form="send-verification" class="btn btn-link p-0 align-baseline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-info py-2 mb-0" role="alert">
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
