<x-guest-layout class="bg-purple-500 ">
    <x-authentication-card class="bg-black">
        <x-slot name="logo" >
            <a href="/">
                <img src="{{ Storage::url('logo/Group.png')}}" class="w-100 h-20 fill-current text-gray-500" />
                </a>
           
        </x-slot>

        <x-validation-errors class="mb-4 " />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form  method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo electronico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <span class="text-center text-sm text-gray-600">{{ __('¿Eres nuevo? ') }}</span>
                    <span class="text-center text-sm text-gray-600">&nbsp;</span>
                    <a href="register">
                    <span class="text-center text-sm underline text-gray-600">{{ __(' Crea una cuenta nueva') }}</span>
                    </a>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
