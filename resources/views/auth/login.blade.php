<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" value="Email"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Parola"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">Beni hatırla</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('register')}}">
                    Üye Ol
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-3"
                   href="{{ route('password.request') }}">
                    Parolamı Unuttum
                </a>
                <x-button class="ml-3">
                    Giriş Yap
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
