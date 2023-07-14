<x-mail::message>
# Nuevo Registro para Presentación de Negocios

Hola {{ $referral->user->name }},

{{ $request->name }} se ha registrado a la presentación de negocios.
Su correo electrónico es: {{ $request->email }} <br>
Su número de teléfono es: {{ $request->phone }}.

Recuerda comunicarte para darle seguimiento a su registro y confirmar su asistencia.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
