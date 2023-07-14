@if($currentZoomDate)
<div class="bg-white shadow rounded p-7 mb-6">
    <h3 class="text-xl mb-7">
        Próxima presentación
    </h3>

    <p class="mt-2 text-sm">
        Título: <strong>Presentación de Negocios</strong>
    </p>
    <p class="mt-2 text-sm">
        Fecha: <strong>{{ \Carbon\Carbon::parse($currentZoomDate->date)->format('d/m/Y') }}</strong>
    </p>
    <p class="mt-2 text-sm">
        Hora: <strong>{{ \Carbon\Carbon::parse($currentZoomDate->time)->format('H:i a') }}</strong>
    </p>
    <p class="mt-2 text-sm">
        Enlace: <strong>{{ $currentZoomDate->join_url }}</strong>
    </p>
    <p class="mt-2 text-sm">
        Contraseña: <strong>{{ $currentZoomDate->password ? $currentZoomDate->password : 'Sín contraseña' }}</strong>
    </p>
    <p class="mt-2 text-sm">
        Cupo máximo: <strong>{{ $currentZoomDate->participants }} personas</strong>
    </p>
    <p class="mt-2 text-sm">
        Participantes registrados: <strong>{{ $currentZoomDate->registers->count() }} personas</strong>
    </p>
    <div class="flex items-center space-x-4 mt-6">
        <p class="text-sm">
            <a href="{{ route('zoom-dates.show', $currentZoomDate) }}" class="inline-block text-sm underline">
                Ver detalles
            </a>
        </p>
        <form action="{{ route('end-presentation', $currentZoomDate) }}" method="POST" onsubmit="return confirm('¿Estás seguro de cerrar el registro de asistencia?')">
            @csrf
            @method('PUT')
            <button type="submit" class="inline-block text-sm underline text-red-600">
                Cerrar registro de asistencia
            </button>
        </form>
    </div>
</div>
@else
<div class="bg-white shadow rounded p-7 mb-6">
    <h3 class="text-xl mb-6">
        No tienes ninguna presentación programada
    </h3>
    <p>
        <a href="{{ route('zoom-dates.create') }}" class="text-primary underline font-bold text-sm">
            Agregar presentación
        </a>
    </p>
</div>
@endif