<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <x-layout>
            <x-slot name="title">
                新規登録 - NOTE
            </x-slot>

            <div class="top-right">
                <div class="login">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="center">
                            <!-- Name -->
                            <div class="mar_bottom10">
                                <div class="square"></div>
                                <x-label for="name" :value="__('名前')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mar_bottom10">
                                <div class="square"></div>
                                <x-label for="email" :value="__('メールアドレス')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required />
                            </div>

                            <!-- Password -->
                            <div class="mar_bottom10">
                                <div class="square"></div>
                                <x-label for="password" :value="__('パスワード')" />

                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mar_bottom10">
                                <div class="square"></div>
                                <x-label for="password_confirmation" :value="__('パスワード(確認用)')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required />
                            </div>
                        </div>

                        <x-button class="create">
                            {{ __('ユーザー登録') }}
                        </x-button>
                    </form>

                </div>
            </div>

        </x-layout>
    </x-auth-card>
</x-guest-layout>
