<x-guest-layout>
    <section class="bg-primary h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset('img/pexels-mike-tyurin-5534734.jpg') }})">
        <div class="container mx-auto py-16">
            <div class="w-4/12 mx-auto">

                <div class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">

                    <h2 class="text-xl font-bold text-left mb-8 text-primary text-center">
                        Oportunidades de Éxito
                    </h2>

                    @if($errors->any())
                    <div class="text-red-500 text-xs italic mb-4">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('config.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="">
                                Nombre completo
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label for="">
                                Generar una contraseña
                            </label>
                            <input type="password" class="form-control" name="password" required />
                            @error('password')
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Código de referido
                            </label>
                            <input type="text" class="form-control" name="code" value="{{ old('code') }}" />
                            @error('referral_code')
                            <span class="text-red-500 text-xs italic" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary">
                            Registrar nuevo usuario
                        </button>

                    </form>
                </div>
                <p class="text-center text-white font-bold text-xs">
                    &copy; {{ date('Y') }} Oportunidades de Éxito, Derechos Reservados.
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>