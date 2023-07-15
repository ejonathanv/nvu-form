<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Referidos registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded shadow">
                <div class="p-7">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl">
                            Lista de referidos
                        </h3>
                        <a href="{{ route('referrals.create') }}" class="text-primary underline text-sm font-semibold">
                            Nuevo referido
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Código de referido</th>
                            <th>Fecha de registro</th>
                            <th>
                                Editar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($referrals as $referral)
                            <tr>
                                <td>
                                    {{ $referral->user->name }}
                                </td>
                                <td>
                                    {{ $referral->user->email }}
                                </td>
                                <td>
                                    {{ $referral->code }}
                                </td>
                                <td>
                                    {{ $referral->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a href="{{ route('referrals.show', $referral) }}" class="text-primary underline">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
