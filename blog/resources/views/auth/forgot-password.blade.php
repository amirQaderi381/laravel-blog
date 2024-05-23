<x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- user name -->
        <div>
            <x-input-label for="user_name" :value="__('نام کاربری')" />
            <x-text-input id="user_name" class="block mt-1 w-full" type="email" name="user_name" :value="old('user_name')" required autofocus />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('بازیابی رمز عبور') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
