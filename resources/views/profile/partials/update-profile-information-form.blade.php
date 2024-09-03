<section>
    <header class="pb-0">
        <h2 class='text-xl font-semibold '>Profile Setting</h2>

        <p>
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="name" class="inline-block mb-3">Firstname</label>
                <input id="firstname" name="firstname" type="text" class="w-full rounded"
                    value="{{ old('firstname', $user->firstname) }}" required autofocus autocomplete="firstname" />
                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
            </div>
            <div>
                <label for="name" class="inline-block mb-3">Lastname</label>
                <input id="lastname" name="lastname" type="text" class="w-full rounded"
                    value="{{ old('lastname', $user->lastname) }}" required autofocus autocomplete="lastname" />
                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
            </div>
        </div>

        <div class="mt-3">
            <label for="email" class="inline-block mb-3">Email</label>

            <input id="email" name="email" type="email" class="w-full rounded"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        'Your email address is unverified.

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-3">
            <button class="px-8 py-2 text-white bg-blue-800 rounded-md">Save</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

</section>
