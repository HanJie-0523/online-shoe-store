<section class="space-y-6">
    <header>
        <h2>
            Delete Account
        </h2>

        <p>
          Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button class="btn btn-primary"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2>
                Are you sure you want to delete your account?
            </h2>

            <p>
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <label class='form-label' for="password">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password" required><br>


                {{-- <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" /> --}}

                {{-- <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                /> --}}

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button x-on:click="$dispatch('close')" class="btn btn-md btn-secondary">
                    Cancel
                </button>

                <button class="btn btn-md btn-danger" >
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</section>
