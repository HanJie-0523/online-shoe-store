<section>
    <header>
        <h2>Profile Information</h2>

        <p>Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label class='form-label' for="name">Name:</label><br>
            <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                required><br>

            {{-- <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        </div>

        <div>
            <label class='form-label' for="email">Email:</label><br>
            <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" required>
            @error('email')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
            <br>


            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" /> --}}

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p>
                        Your email address is unverified.

                        <button form="send-verification" class="">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p>
                           A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <!--Contact-->
            <label class='form-label' for="contact">Contact:</label><br>
            <input class="form-control" type="tel" id="contact" name="contact" value="{{$user->contact}}"
                pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$"><br>

        </div>

        <div>
            <!--Address-->
            <label class='form-label' for="address">Address:</label><br>
            <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}"><br>

        </div>

        <div>
            <button class="btn btn-sm btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">Saved</p>
            @endif
        </div>
    </form>
</section>
