<div class="space-y-4 ">
    <h2 class='text-xl font-semibold '>Shop Information</h2>
    <div class="grid grid-cols-2 gap-6">
        <div class="space-y-2">
            <input id="name" name="name" placeholder="Shop Name" type="text" class="w-full rounded"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="" :messages="$errors->get('name')" />
        </div>
        <div class="space-y-2">
            <input id="email" name="email" placeholder="Email" type="email" class="w-full rounded"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm text-gray-800 ">
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
    </div>
    <div>
        <textarea class="w-full rounded bg-gray-50" name="description" id=""
            placeholder="Write something about your shop." rows="2">{{ $user->vendor->description }}</textarea>
    </div>
</div>

