<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')
        <div class="flex items-center justify-between">
            <h2 class='font-medium underline '>Change Password</h2>
            <div>
                <button class="px-8 py-2 text-sm text-white bg-green-600 rounded-md">Change</button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-3 gap-2">
            
        <div class="space-y-2">
            <label for="update_password_current_password" class="inline-block">Current Password<sup>*</sup></label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="block w-full rounded" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div  class="space-y-2">
            <label for="update_password_password" class="inline-block">New Password<sup>*</sup></label>
            <input id="update_password_password" name="password" type="password"class="block w-full rounded"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div  class="space-y-2">
            <label for="update_password_password_confirmation" class="inline-block">Confirm Password<sup>*</sup></label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="block w-full rounded" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>
        </div>


    </form>

</section>
