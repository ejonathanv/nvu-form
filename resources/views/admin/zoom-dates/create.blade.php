<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generar nueva fecha de presentación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-7 rounded w-6/12 mx-auto shadow">
                <h3 class="text-xl mb-7">
                    Nueva fecha de presentación
                </h3>
                <form action="{{ route('zoom-dates.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">
                            Fecha:
                        </label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                        @error('date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">
                            Hora:
                        </label>
                        <input type="time" name="time" class="form-control" value="{{ old('time') }}" required>
                        @error('time')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">
                            Link de zoom: (Ej. https://zoom.us/j/1234567890)
                        </label>
                        <input type="text" name="join_url" class="form-control" value="{{ old('join_url') }}" required>
                        @error('join_url')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">
                            Contraseña de zoom: (Opcional)
                        </label>
                        <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">
                            Cupo máximo: (Si no se especifica, quedará como ilimitado)
                        </label>
                        <input type="number" name="participants" class="form-control" value="{{ old('participants') }}">
                        @error('participants')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="active" value="1" checked>
                            Establecer como fecha activa (Solo puede haber una fecha activa)
                        </label>
                    </div>

                    <div class="mt-10">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
