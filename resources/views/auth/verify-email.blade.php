@component('layouts.admin-guest', ['title' => 'Verify Email'])
    <div class="login-box" style="width: 520px; max-width: calc(100vw - 2rem);">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0">{{ config('app.name', 'Laravel') }}</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Verify your email</p>
                <p class="text-body-secondary">
                    {{ __("Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="d-flex gap-2 align-items-center justify-content-between flex-wrap">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-1"></i> {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcomponent
