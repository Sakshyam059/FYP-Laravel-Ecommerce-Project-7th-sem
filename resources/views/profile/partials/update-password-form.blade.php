<section class="pb-3">
    <header class="">
        <h2 class='text-xl font-semibold '>Update Password</h2>

        <p class="">
            Ensure your account is using a long, random password to stay secure.

        </p>
    </header>


        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div>
                <label for="update_password_current_password" class="inline-block mb-3">Current Password</label>
                <input id="update_password_current_password" name="current_password" type="password"
                   class="block w-1/2 rounded" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="mt-3">
                <label for="update_password_password" class="inline-block mb-3">New Password</label>
                <input id="update_password_password" name="password" type="password"class="block w-1/2 rounded"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="mt-3">
                <label for="update_password_password_confirmation" class="inline-block mb-3">Confirm Password</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="block w-1/2 rounded" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-3">
                <button class="px-8 py-2 text-white bg-blue-800 rounded-md">Save</button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>

</section>
