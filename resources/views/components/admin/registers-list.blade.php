@if(count($registers))
<div class="bg-white shadow rounded">
    <div class="p-7 flex items-center justify-between">
        <h3 class="text-xl">
            Registros
        </h3>

        <form action="{{ route('download-all-registers') }}" method="POST">
            @csrf
            <button type="submit" class="underline text-sm">
                Descargar registros
            </button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registers as $register)
            <tr>
                <td>{{ $register->name }}</td>
                <td>{{ $register->email }}</td>
                <td>{{ $register->phone }}</td>
                <td>{{ $register->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif