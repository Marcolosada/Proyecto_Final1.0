<head>
    <!-- Compiled and minified JavaScript -->
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Sniglet&display=swap');

        .titulocards{
            font-family: 'Covered By Your Grace', cursive;
        }
        .subtitulos{
            font-family: 'Sniglet', cursive;
        }
    </style>
</head>

<x-guest-layout class="">
    <h1 class="fill-current text-center text-[#FC2947]  titulocards text-5xl  py-12">INICIA TU SESIÓN</h1>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo:')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-4" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña:')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-4" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 " name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="ml-4 bg-[#581c87] hover:bg-blue-700 text-[#fde047] font-bold py-2 px-4 rounded">
                {{ __('INICIAR!') }}
            </button>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Olvidó su contraseña?') }}
            </a>
            @endif
        </div>
    </form>
</x-guest-layout>