<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar referido') }}
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

                    <form action="{{ route('referrals.update', $referral) }}" class="px-7 pb-5" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">
                                Nombre completo:
                            </label>
                            <input type="text" class="form-control" value="{{ $referral->user->name }}" name="name">
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Correo electrónico:
                            </label>
                            <input type="text" class="form-control" value="{{ $referral->user->email }}" name="email">
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Código de referido:
                            </label>
                            <input type="text" class="form-control" value="{{ $referral->code }}" name="code">
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
                        </div>

                        <button class="btn btn-primary" type="submit">
                            Guardar
                        </button>
                    </form>
                </div>

                <div class="bg-white p-7 rounded shadow mt-7">
                    <p class="text-xs mb-6">
                        Si eliminas este referido, también se eliminarán todos los registros de sus referidos.
                    </p>

                    <form action="{{ route('referrals.destroy', $referral) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este referido?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger-outline mt-7">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
