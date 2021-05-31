<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" value="İsim"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Surname -->
            <div class="mt-4">
                <x-label for="surname" value="Soyad"/>

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"
                         required/>
            </div>

            <!-- TC -->
            <div class="mt-4">
                <x-label for="tc" value="TC No"/>

                <x-input id="tc" class="block mt-1 w-full" type="text" name="tc" :value="old('tc')"
                         required/>
            </div>

            <!-- Birth Date -->
            <div class="mt-4">
                <x-label for="birth_date" value="Doğum Tarihi"/>
                <x-input
                    id="birth_date"
                    class="block mt-1 w-full"
                    type="date" name="birth_date"
                    :value="old('birth_date')"
                    required
                />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Parola"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Parola Tekrar"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Giriş Yap
                </a>

                <x-button class="ml-4">
                    Üye Ol
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
