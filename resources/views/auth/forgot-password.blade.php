@component('layouts.admin-guest', ['title' => 'Forgot Password'])
    <div class="login-box">
        <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg mb-2">Forgot your password?</p>
                <p class="text-body-secondary small">
                    Enter your email and we’ll send a password reset link.
                </p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

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

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input
                                id="forgotEmail"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Email"
                                required
                                autofocus
                            />
                            <label for="forgotEmail">Email</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Email Password Reset Link</button>
                    </div>
                </form>

                <p class="mb-0 mt-3">
                    <a href="{{ route('login') }}">Back to login</a>
                </p>
            </div>
        </div>
    </div>
@endcomponent
