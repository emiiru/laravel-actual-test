@component('layouts.admin-guest', ['title' => 'Register'])
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('register') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </a>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input
                                id="registerName"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Name"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <label for="registerName">Name</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input
                                id="registerEmail"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Email"
                                required
                                autocomplete="username"
                            />
                            <label for="registerEmail">Email</label>
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
                                id="registerPassword"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Password"
                                required
                                autocomplete="new-password"
                            />
                            <label for="registerPassword">Password</label>
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
                                id="registerPasswordConfirmation"
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation"
                                placeholder="Confirm Password"
                                required
                                autocomplete="new-password"
                            />
                            <label for="registerPasswordConfirmation">Confirm Password</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock"></span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>

                <p class="mb-0 mt-3">
                    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                </p>
            </div>
        </div>
    </div>
@endcomponent
