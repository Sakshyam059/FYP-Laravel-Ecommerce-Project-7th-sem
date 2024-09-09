<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="space-y-2">
        @csrf
        @method('patch')
        <div class="flex items-center justify-between">
            <h2 class='font-medium underline '>Personal Details</h2>
            <div class="space-y-2">
                <button class="px-8 py-2 text-sm text-white bg-green-600 rounded-md">Update</button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>

        <div class="space-y-2">
            <label for="name" class="inline-block ">Full Name</label>
            <input id="name" name="name" type="text" class="w-full rounded"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div class="grid grid-cols-2 gap-3 text-sm ">
            <div class="space-y-2">
                <label for="phone" class="inline-block ">Phone Number</label>
                <input id="phone" name="phone" type="text" class="w-full rounded"
                    value="{{ old('phone', $user->phone) }}" required autofocus autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
            <div class="space-y-2 ">
                <label for="email" class="inline-block ">Email Address</label>
                <input id="email" name="email" type="email" class="w-full rounded"
                    value="{{ old('email', $user->email) }}" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="mt-2 text-gray-800">
                            'Your email address is unverified.

                            <button form="send-verification"
                                class="text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Click here to re-send the verification email.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-green-600">
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>


    </form>

</section>
