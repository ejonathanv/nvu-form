<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo referido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-5/12 mx-auto">
                <div class="bg-white rounded shadow">
                    <div class="p-7">
                        <h3 class="text-xl">
                            Información del referido
                        </h3>
                    </div>

                    <form action="{{ route('referrals.store') }}" class="px-7 pb-5" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">
                                Nombre completo:
                            </label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Correo electrónico:
                            </label>
                            <input type="text" class="form-control" value="{{ old('email') }}" name="email">
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Código de referido:
                            </label>
                            <input type="text" class="form-control" value="{{ old('code') }}" name="code">
                            @error('code')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <h4 class="text-xl mt-7 mb-3">
                            Seguridad
                        </h4>

                        <div class="form-group">
                            <label for="">
                                Contraseña:
                            </label>
                            <input type="password" class="form-control" value="" name="password">
                            @error('password')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
