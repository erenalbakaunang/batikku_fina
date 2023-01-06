<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="mt-4 md-4">
        @csrf

        <p>Welcome !</p>
        <h1>Sign up to</h1>
        <p>Batikku - 'Batik Fashion Trendy'</p>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Phone Number/Email')" />
            <x-text-input id="email" class="w-full" type="email" placeholder="Enter your email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-2">
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" class="w-full"  placeholder="Enter your user name" type="text" name="name" :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="w-full"  placeholder="Enter your password" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="mt-2">
            <x-input-label for="date" :value="__('Birth Date')" />
            <x-text-input class="w-full" type="date" placeholder="Enter your birthday" name="date" :value="old('date')" required />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <!-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> -->

        <div>
            <button class="w-full" >
                {{ __('Register') }}
            </button>
        </div>

        <div class="mt-2 w-full text-center">
            <small>{{ __('Already have an account?') }}</small>
            <a class="text-sm text-gray-900 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                <b>{{ __('Login') }}</b>
            </a>
        </div>
    </form>
</x-guest-layout>
