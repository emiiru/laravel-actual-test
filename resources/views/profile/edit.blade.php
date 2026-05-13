@component('layouts.admin', ['title' => 'Profile'])
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center">
                    @php
                        $name = Auth::user()->name;
                        $initials = collect(preg_split('/\s+/', trim($name)))
                            ->filter()
                            ->take(2)
                            ->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))
                            ->join('');
                    @endphp

                    <div
                        class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center mb-2"
                        style="width: 88px; height: 88px; font-size: 30px; font-weight: 600;"
                        aria-label="User avatar"
                    >
                        {{ $initials ?: 'U' }}
                    </div>

                    <h5 class="mb-0">{{ $name }}</h5>
                    <div class="text-body-secondary">{{ Auth::user()->email }}</div>

                    <div class="mt-2">
                        @if (Auth::user()->email_verified_at)
                            <span class="badge text-bg-success">
                                <i class="bi bi-patch-check me-1"></i> Verified
                            </span>
                        @else
                            <span class="badge text-bg-warning">
                                <i class="bi bi-exclamation-triangle me-1"></i> Unverified
                            </span>
                        @endif
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                            <i class="bi bi-speedometer2 me-1"></i> Back to dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-transparent border-danger-subtle">
                    <h3 class="card-title text-danger mb-0">
                        <i class="bi bi-exclamation-octagon me-1"></i> Danger zone
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="bi bi-person-lines-fill me-1"></i> Profile
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="bi bi-shield-lock me-1"></i> Security
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endcomponent
