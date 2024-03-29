<x-guest-layout>
    <section class="bg-primary h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset('img/pexels-mike-tyurin-5534734.jpg') }})">
        <div class="container mx-auto py-16">
            <div class="w-4/12 mx-auto">
                
                <div class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">

                    <h2 class="text-xl font-bold text-left mb-8 text-primary text-center">
                        Oportunidades de Éxito
                    </h2>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="">
                                Correo electrónico
                            </label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                            @error('email')
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="">
                                Contraseña
                            </label>
                            <input type="password" class="form-control" name="password" required />
                            @error('password')
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Recordar cuenta') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                            @endif

                            <button class="btn btn-primary">
                                Inciar sesión
                            </button>
                        </div>
                    </form>
                </div>
                <p class="text-center text-white font-bold text-xs">
                    &copy; {{ date('Y') }} Oportunidades de Éxito, Derechos Reservados.
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>