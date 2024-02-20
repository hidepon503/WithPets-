<x-guest-layout>
    <form method="POST" action="{{ route('register') }}  ">
        @csrf

        {{-- owner_name --}}
        <div class="">
            <x-input-label for="owner_name" :value="__('代表名')" />
            <x-text-input id="owner_name" class="block mt-1 w-full" type="text" name="owner_name" :value="old('owner_name')" required autofocus autocomplete="owner_name" />
            <x-input-error :messages="$errors->get('owner_name')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('団体名')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        
        {{-- postcode --}}
        <div class="mt-4">
            <p class="">団体所在地</p>
            <x-input-label for="postcode" class="mt-1" :value="__('郵便番号')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" required autofocus autocomplete="postcode" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
            <p class="mt-1">住所</p>
            {{-- prefecture --}}
            <x-input-label for="prefecture" :value="__('都道府県')" />
            <x-text-input id="prefecture" class="block mt-1 w-full" type="text" name="prefecture" :value="old('prefecture')" required autofocus autocomplete="prefecture" />    
            <x-input-error :messages="$errors->get('prefecture')" class="mt-2" />
            {{-- city --}}
            <x-input-label for="city"  :value="__('市区町村')" class="mt-2" />
            <x-text-input id="city" name="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
            {{-- street --}}
            <x-input-label for="street" class="mt-2" :value="__('番地')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autofocus autocomplete="street" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
            {{-- building --}}
            <x-input-label for="building" class="mt-2" :value="__('建物名・部屋番号')" />
            <x-text-input id="building" class="block mt-1 w-full" type="text" name="building" :value="old('building')" required autofocus autocomplete="building" />
            <x-input-error :messages="$errors->get('building')" class="mt-2" />
            {{-- other --}}
            <x-input-label for="other" class="mt-2" :value="__('その他')" />
            <x-text-input id="other" class="block mt-1 w-full" type="text" name="other" :value="old('other')" autofocus autocomplete="other" />
            <x-input-error :messages="$errors->get('other')" class="mt-2" />
        </div>

        <!-- Tel -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('電話番号（団体）')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
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
