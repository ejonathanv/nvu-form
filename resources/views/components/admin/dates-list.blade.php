@if(count($zoomDates))
<div class="bg-white shadow rounded">
    <div class="p-7">
        <h3 class="text-xl">
            Presentaciones anteriores
        </h3>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Participantes</th>
                <th>Registros</th>
                <th>
                    Detalles
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($zoomDates as $zoomDate)
            <tr>
                <td>{{ Carbon\Carbon::parse($zoomDate->date)->format('d/m/Y') }}</td>
                <td>{{ Carbon\Carbon::parse($zoomDate->time)->format('H:i a') }}</td>
                <td>{{ $zoomDate->participants }}</td>
                <td>{{ $zoomDate->registers->count() }}</td>
                <td>
                    <a href="{{ route('zoom-dates.show', $zoomDate) }}" class="text-primary underline">
                        Ver detalles
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif