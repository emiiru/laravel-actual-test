<section>
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h5 class="mb-1 text-danger">{{ __('Delete Account') }}</h5>
            <p class="text-body-secondary mb-0">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>
    </div>

    <button
        type="button"
        class="btn btn-outline-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirmUserDeletionModal"
    >
        <i class="bi bi-trash me-1"></i> {{ __('Delete Account') }}
    </button>

    <div
        class="modal fade"
        id="confirmUserDeletionModal"
        tabindex="-1"
        aria-labelledby="confirmUserDeletionModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-body-secondary">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-0">
                            <label for="deleteAccountPassword" class="form-label">{{ __('Password') }}</label>
                            <input
                                id="deleteAccountPassword"
                                name="password"
                                type="password"
                                class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}"
                                placeholder="{{ __('Password') }}"
                                autocomplete="current-password"
                            />
                            @if ($errors->userDeletion->has('password'))
                                <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i> {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->userDeletion->isNotEmpty())
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const modalEl = document.getElementById('confirmUserDeletionModal');
                    if (!modalEl || !window.bootstrap?.Modal) return;
                    new window.bootstrap.Modal(modalEl).show();
                });
            </script>
        @endpush
    @endif
</section>
