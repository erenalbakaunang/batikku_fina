<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-5 mb-5">
        @csrf

        <p>Welcome !</p>
        <h1>Login in to</h1>
        
        <p>Batikku - Batik Fashion Trendy</p>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="w-full" type="email" placeholder="Enter your username" name="email" :value="old('email')" required autofocus />
        
        <x-input-label for="password" :value="__('Password')" class="mt-4" />
        <x-text-input id="password" class="w-full" type="password" placeholder="Enter your password" name="password" required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <button class="w-full mt-5">Login</button>

        <div class="posisireg w-full">
        <p>
            <label for="">Don’t have an Account ? <a href="{{ route('register') }}">Register</a></label>
        </p>
        </div>
    </form>
</x-guest-layout>
