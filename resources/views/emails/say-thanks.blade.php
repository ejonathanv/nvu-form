<x-mail::message>
# Gracias por tu registro a la Presentación de Negocios

Hola {{ $request->name }}, Te registraste exitosamente en nuestra Presentación Gratuita de Diversificación de Ingresos.

A partir de este momento ya eres parte de nuestra comunidad de emprendedores y empresarios que buscan mejorar sus ingresos y su calidad de vida.

Te esperamos el día {{ \Carbon\Carbon::parse($zoomDate->date)->format('d M, Y') }} a las {{ \Carbon\Carbon::parse($zoomDate->time)->format('h:i a') }} (Hora de Tijuana) en el siguiente enlace:

@if($zoomDate->password)
Contraseña de Zoom: {{ $zoomDate->password }}
@endif

<x-mail::button :url="$zoomDate->join_url">
    Unirse a la Presentación Gratuita en Zoom
</x-mail::button>

¡Te esperamos! 🚀

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
