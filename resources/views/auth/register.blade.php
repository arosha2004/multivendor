<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black text-gray-900 tracking-tight">Create Account</h2>
        <p class="text-sm font-semibold text-gray-500 mt-1">Register as a buyer or vendor to get started.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <x-text-input id="name" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <x-text-input id="email" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@domain.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Selector -->
        <div>
            <x-input-label for="role" :value="__('Register As')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <select id="role" name="role" class="block mt-1.5 w-full border-gray-300 focus:border-[#FEE000] focus:ring-[#FEE000] rounded-xl shadow-sm text-sm" required>
                <option value="buyer" {{ old('role') == 'buyer' ? 'selected' : '' }}>Buyer (Shop on emall)</option>
                <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor (Sell on emall)</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <x-text-input id="password" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-bold text-gray-700 text-xs uppercase tracking-wider" />
            <x-text-input id="password_confirmation" class="block mt-1.5 w-full focus:ring-[#FEE000] focus:border-[#FEE000] rounded-xl border-gray-300 shadow-sm text-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full bg-gray-900 text-white font-bold py-3 rounded-xl text-sm hover:bg-black transition uppercase tracking-wider shadow-md active:scale-95 duration-150">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <!-- Login redirect -->
    <div class="mt-8 pt-6 border-t border-gray-150 text-center text-xs font-bold text-gray-500">
        Already registered? 
        <a href="{{ route('login') }}" class="text-[#e65c00] hover:text-[#ff751a] hover:underline ml-1">
            Sign in instead
        </a>
    </div>
</x-guest-layout>
