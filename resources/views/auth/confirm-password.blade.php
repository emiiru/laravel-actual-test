@component('layouts.admin-guest', ['title' => 'Confirm Password'])
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('dashboard') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Confirm your password</p>
                <p class="text-body-secondary small">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <div class="fw-semibold mb-1">Please fix the errors below.</div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input
                                id="confirmPassword"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Password"
                                required
                                autocomplete="current-password"
                                autofocus
                            />
                            <label for="confirmPassword">{{ __('Password') }}</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-shield-lock me-1"></i> {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
