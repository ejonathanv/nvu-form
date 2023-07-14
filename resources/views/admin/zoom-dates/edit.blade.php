<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar fecha de presentación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-6/12 mx-auto">
                <div class="bg-white p-7 rounded shadow">
                    <h3 class="text-xl mb-7">
                        Editar fecha de presentación
                    </h3>
                    <form action="{{ route('zoom-dates.update', $zoomDate) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">
                                Fecha:
                            </label>
                            <input type="date" name="date" class="form-control" value="{{ \Carbon\Carbon::parse($zoomDate->date)->format('Y-m-d') }}" required>
                            @error('date')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Hora:
                            </label>
                            <input type="time" name="time" class="form-control" value="{{ \Carbon\Carbon::parse($zoomDate->time)->format('H:i') }}" required>
                            @error('time')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Link de zoom: (Ej. https://zoom.us/j/1234567890)
                            </label>
                            <input type="text" name="join_url" class="form-control" value="{{ $zoomDate->join_url }}" required>
                            @error('join_url')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Contraseña de zoom: (Opcional)
                            </label>
                            <input type="text" name="password" class="form-control" value="{{ $zoomDate->password }}">
                            @error('password')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                Cupo máximo: (Si no se especifica, quedará como ilimitado)
                            </label>
                            <input type="number" name="participants" class="form-control" value="{{ $zoomDate->participants }}">
                            @error('participants')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="active" value="1" @if($zoomDate->active) checked @endif>
                                Establecer como fecha activa (Solo puede haber una fecha activa)
                            </label>
                        </div>

                        <div class="mt-10">
                            <button type="submit" class="btn btn-primary">
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
                <div class="bg-white p-7 rounded shadow mt-7">
                    <p class="text-xs mb-7">
                        Eliminar fecha de presentación, al eliminar una fecha de presentación no se eliminarán los registros de los usuarios que se registraron a la misma. Si deseas consultar los registros de los usuarios que se registraron a una fecha de presentación, puedes hacerlo desde la sección de registros.
                    </p>

                    <form action="{{ route('zoom-dates.destroy', $zoomDate) }}" method="POST" class="mt-7" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta fecha de presentación?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger-outline mt-7">
                            Eliminar fecha de presentación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
