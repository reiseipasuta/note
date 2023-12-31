<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <x-layout>
            <x-slot name="title">
                Login - NOTE
            </x-slot>

            <div class="top-right">
                <div class="login">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mar_bottom10">
                            <x-label for="email" :value="__('メールアドレス')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mar_bottom10">
                            <x-label for="password" :value="__('パスワード')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mar_bottom10">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('情報を記憶する') }}</span>
                            </label>
                        </div>

                        <div class="mar_bottom10">
                            {{-- @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    {{ __('パスワード再発行') }}
                                </a>
                            @endif --}}

                            <x-button class="create">
                                {{ __('ログイン') }}
                            </x-button>
                        </div>
                    </form>

                </div>

            </div>

        </x-layout>
    </x-auth-card>
</x-guest-layout>
