<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iniciar Sesión</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* Tus estilos Tailwind existentes aquí... */
                /* Mantén todo el CSS que ya tienes */
            </style>
        @endif

        <style>
            .login-container {
                display: flex;
                min-height: 100vh;
            }
            
            .login-image {
                flex: 1;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
            }
            
            .login-form {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
                background: #FDFDFC;
            }
            
            .form-container {
                width: 100%;
                max-width: 400px;
            }
            
            @media (max-width: 768px) {
                .login-container {
                    flex-direction: column;
                }
                
                .login-image {
                    min-height: 300px;
                }
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="login-container">
            <!-- Lado izquierdo - Imagen -->
            <div class="login-image">
                <div class="text-center text-white">
                    <img 
                        src="https://laverdaddemonagas.com/wp-content/uploads/2024/05/pensionados-ivss-consulta-tu-saldo-en-linea-y-cuenta-individual-facil-laverdaddemonagas.com-images--2--removebg-preview.png" 
                        alt="Workspace"
                        class="w-full h-64 object-cover rounded-lg shadow-lg mb-4"
                    >
                </div>
            </div>

            <!-- Lado derecho - Formulario con componentes Breeze -->
            <div class="login-form">
                <div class="form-container">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-[#1b1b18]  mb-2">
                            Iniciar Sesión
                        </h1>
                        <p class="text-[#706f6c]">
                            Ingresa tus credenciales para continuar
                        </p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-[#1b1b18]"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ms-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="text-center mt-6">
                            <p class="text-sm text-[#706f6c]">
                                ¿No tienes una cuenta?
                                <a
                                    href="{{ route('register') }}"
                                    class="font-medium text-[#f53003] dark:text-[#FF4433] hover:underline ml-1"
                                >
                                    Regístrate
                                </a>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>