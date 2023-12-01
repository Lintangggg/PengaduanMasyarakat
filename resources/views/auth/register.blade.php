<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="telp" :value="__('Telp')" />
            <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autofocus autocomplete="telp" />
            <x-input-error :messages="$errors->get('telp')" class="mt-2" />
        </div>

        {{-- <div class="mt-4" style="rounded; display: block; margin-top: 1rem; width: 100%; border-bottom: 1px solid #ccc; outline: none; border-color: #4F46E5;" class="focus:border-indigo-500">
            <x-input-label for="role" :value="__('Role')" />

            <select id="role" name="role" style="rounded; background-color: #111827; color: #ffffff; display: block; width: 100%; border-bottom: 1px solid #ccc; outline: none;" class="focus:border-indigo-500">
                <option disabled>--- Silahkan Pilih Role Anda ---</option>
                    <option value="admin">Admin</option>
                    <option value="sosial">Sosial</option>
                    <option value="infrastruktur">Infrastruktur</option>
            </select>


            <x-input-error :messages="$errors->get('Role')" class="mt-2" />
        </div> --}}
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
