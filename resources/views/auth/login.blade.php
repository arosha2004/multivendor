<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black text-gray-900 tracking-tight">Welcome Back</h2>
        <p class="text-sm font-semibold text-gray-500 mt-1">Sign in to your emall account to continue shopping.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <x-text-input id="email" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="e.g. name@domain.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-gray-900 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-[#FEE000] focus:ring-offset-0 focus:ring-1" name="remember">
                <span class="ms-2 text-xs font-semibold text-gray-600">{{ __('Keep me signed in') }}</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-gray-900 text-white font-bold py-3 rounded-xl text-sm hover:bg-black transition uppercase tracking-wider shadow-md active:scale-95 duration-150">
                {{ __('Log in') }}
            </button>
        </div>
    </form>

    <!-- Sign up redirect -->
    <div class="mt-8 pt-6 border-t border-gray-150 text-center text-xs font-bold text-gray-500">
        New to emall? 
        <a href="{{ route('register') }}" class="text-[#e65c00] hover:text-[#ff751a] hover:underline ml-1">
            Create an account
        </a>
    </div>
</x-guest-layout>
