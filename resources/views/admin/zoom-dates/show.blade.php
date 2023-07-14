<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de fecha de presentación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-9/12 mx-auto flex flex-col space-y-6 items-start">
                <div class="bg-white p-7 rounded shadow w-full">
                    <h3 class="text-xl mb-7">
                        Detalles de fecha de presentación
                    </h3>

                    <p class="mb-3 text-sm">
                        <strong>Fecha de presentación:</strong> {{ \Carbon\Carbon::parse($zoomDate->date)->format('d/m/Y') }}
                    </p>
                    <p class="mb-3 text-sm">
                        <strong>Hora:</strong> {{ \Carbon\Carbon::parse($zoomDate->time)->format('H:i') }}
                    </p>
                    <p class="mb-3 text-sm">
                        <strong>Link de zoom:</strong> <a href="{{ $zoomDate->join_url }}" target="_blank">{{ $zoomDate->join_url }}</a>
                    </p>
                    <p class="mb-3 text-sm">
                        <strong>Contraseña de zoom:</strong> {{ $zoomDate->password ?? 'No especificada' }}
                    </p>
                    <p class="mb-3 text-sm">
                        <strong>Cupo máximo:</strong> {{ $zoomDate->participants }} personas
                    </p>
                    <p class="mb-3 text-sm">
                        <strong>Fecha de creación:</strong> {{ \Carbon\Carbon::parse($zoomDate->created_at)->format('d/m/Y') }}
                    </p>
                    <p>
                        <strong>Activa:</strong> {{ $zoomDate->active ? 'Si' : 'No' }}
                    </p>


                    <a href="{{ route('zoom-dates.edit', $zoomDate) }}"
                        class="inline-block mt-7 text-sm underline">
                        Editar fecha de presentación
                    </a>
                </div>
                <div class="bg-white p-7 rounded shadow w-full">
                    <div class="flex items-center justify-between w-full mb-7">
                        <h3 class="text-xl">
                            Registros de asistencia
                        </h3>

                        @if($zoomDate->registers->count() > 0)
                        <form action="{{ route('download-registers', $zoomDate) }}" method="POST">
                            @csrf
                            <button type="submit" class="underline text-sm">
                                Descargar registros
                            </button>
                        </form>
                        @endif
                    </div>
                    @if($zoomDate->registers->count() == 0)
                        <p class="text-sm">
                            No hay registros de asistencia
                        </p>
                    @else
                    <p class="mb-6 text-sm">
                        Total de registros: <strong>{{ $zoomDate->registers->count() }}</strong>
                    </p>
                    <ul class="w-full">
                        @foreach($zoomDate->registers as $register)
                            <li class="flex flex-col space-y-1 py-3 @if(!$loop->last) border-b border-gray-200 @endif">
                                <p class="text-sm font-bold">
                                    {{ $register->name }}
                                </p>
                                <p class="mt-2 text-sm">
                                    {{ $register->email }}
                                </p>
                                <p class="mt-2 text-sm">
                                    {{ $register->phone }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
