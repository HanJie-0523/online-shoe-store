<section>
    <header>
        <h2>Update Password</h2>

        <p>
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class='form-label' for="current_password">Current Password:</label><br>
            <input class="form-control" type="password" id="current_password" name="current_password" required><br>

            {{-- <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
        </div>

        <div>

            <label class='form-label' for="password">Password:</label><br>
            <input class="form-control" type="password" id="password" name="password" required><br>

            {{-- <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
        </div>

        <div>
            <label class='form-label' for="password_confirmation">Confirm Password:</label><br>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required><br>

            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div>
            <button class="btn btn-sm btn-primary">Save</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
