@component('layouts.admin', ['title' => 'Dashboard'])
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ Auth::id() }}</h3>
                    <p>Signed-in user ID</p>
                </div>
                <div class="small-box-icon">
                    <i class="bi bi-person-check"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ Auth::user()->email_verified_at ? 'Yes' : 'No' }}</h3>
                    <p>Email verified</p>
                </div>
                <div class="small-box-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ now()->format('H:i') }}</h3>
                    <p>Server time</p>
                </div>
                <div class="small-box-icon">
                    <i class="bi bi-clock"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ \Illuminate\Support\Str::limit(Auth::user()->email, 18, '…') }}</h3>
                    <p>Signed-in email</p>
                </div>
                <div class="small-box-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome</h3>
                </div>
                <div class="card-body">
                    <p class="mb-2">You’re logged in as <strong>{{ Auth::user()->name }}</strong>.</p>
                    <p class="mb-0">
                        Use the sidebar to navigate, or update your details in
                        <a href="{{ route('profile.edit') }}">Profile</a>.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick actions</h3>
                </div>
                <div class="card-body d-grid gap-2">
                    <a class="btn btn-outline-primary" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-1"></i> Edit profile
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
    </div>
@endcomponent
