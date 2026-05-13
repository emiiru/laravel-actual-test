@component('layouts.admin-guest', ['title' => 'Reset Password'])
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset your password</p>

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

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input
                                id="resetEmail"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                placeholder="Email"
                                autocomplete="username"
                                required
                                autofocus
                            />
                            <label for="resetEmail">{{ __('Email') }}</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input
                                id="resetPassword"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Password"
                                autocomplete="new-password"
                                required
                            />
                            <label for="resetPassword">{{ __('Password') }}</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input
                                id="resetPasswordConfirmation"
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation"
                                placeholder="Confirm Password"
                                autocomplete="new-password"
                                required
                            />
                            <label for="resetPasswordConfirmation">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock"></span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-arrow-repeat me-1"></i> {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
