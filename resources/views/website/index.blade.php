<x-guest-layout>
    
    <div class="h-fit md:h-screen flex flex-col md:flex-row items-stretch">
        <div class="basis-full md:basis-1/2 bg-primary bg-img p-6 md:p-10 flex flex-col relative" style="background-image: url({{ asset('img/pexels-fauxels-3228727.jpg') }})">
            <div>
                <h3 class="text-sm md:text-lg inline-block font-bold mb-7 leading-tight text-white bg-primary bg-opacity-50 md:-left-10 py-4 px-10 uppercase w-full md:w-auto text-center md:text-left">
                    Oportunidades de <span class="text-secondary">Éxito</span>
                </h3>
            </div>

            <h2 class="text-xl md:text-4xl font-bold !leading-tight text-white mt-40 md:my-auto md:top-40 leading-tight text-center md:text-left pr-0 md:pr-40">
                Descubre cómo puedes expandir tus horizontes financieros y abrir nuevas puertas hacia la Libertad Financiera
            </h2>
        </div>
        <div class="basis-full md:basis-1/2 overflow-y-auto flex">
            <div class="my-auto w-full p-10">
                @if(session('success'))
                    <h1 class="text-xl md:text-3xl font-bold mb-7 !leading-tight text-primary text-center md:text-left">
                        {{ session('success') }} 
                        <span class="block text-secondary">
                            ¡Vamos con todo! 🚀
                        </span>
                    </h1>

                    <p class="text-primary mb-9 text-xs md:text-sm md:leading-relaxed text-center md:text-left">
                        Gracias por registrarte a nuestra presentación gratuita sobre diversificación de ingresos. Estamos emocionados de tenerte en nuestro evento y esperamos que puedas aprender mucho de él. Te estaremos enviando los detalles de la próxima presentación a <span class="text-secondary uppercase font-bold">tu correo electrónico</span>. Estate atento a tu bandeja de entrada. ¡Nos vemos pronto!
                    </p>
                @else
                    <h1 class="text-xl md:text-3xl font-bold mb-7 !leading-tight text-primary text-center md:text-left">
                        Regístrate a la <span class="text-secondary block">Presentación Gratuita</span> de Diversificación de Ingresos
                    </h1>

                    @if($zoomDate)

                    <p class="text-primary mb-7 text-xs md:text-sm md:leading-relaxed text-center md:text-left font-bold">
                        Solo hay {{ $zoomDate->participants }} lugares disponibles para esta presentación. <br/>
                        ¡Regístrate ahora para apartar tu lugar!
                    </p>

                    <form action="{{ route('register.store') }}" 
                        method="POST" 
                        class="bg-white shadow rounded p-5 md:p-8 mb-7 w-full"
                        @submit.prevent="submitForm"
                        ref="form">

                        @if(session('error'))
                            <div class="text-red-500 text-xs mb-7 font-bold">
                                {{ session('error') }}
                            </div>
                        @endif

                        @csrf
                        @if(request()->routeIs('referral'))
                            <input type="hidden" 
                                name="referral_code" 
                                value="{{ request()->route()->parameters['referido'] }}">
                        @endif
                        <div class="form-group">
                            <label for="">
                                Nombre completo:
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre completo" value="{{ old('name') }}" autofocus required>
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                            @error('referral_code')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">
                                Correo electrónico:
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">
                                Teléfono:
                            </label>
                            <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label>
                                <input type="checkbox" name="terms" required>
                                Acepto los <a href="#" class="underline text-secondary">Términos y Condiciones</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span v-if="!submiting">
                                Comienza tu viaje hacia la 
                                <span class="!text-white block md:inline-block">¡Libertad Financiera!</span>
                            </span>
                            <span v-else class="flex items-center justify-center w-full block space-x-2">
                                <i class="fas fa-spinner fa-spin"></i>
                                <span class="!text-white">
                                    Procesando registro...
                                </span>
                            </span>
                        </button>
                    </form>
                    @else
                        <h2 class="text-lg font-bold text-left mb-7 text-primary">
                            Lo sentimos, no hay fechas disponibles para la presentación. Estamos trabajando para abrir nuevas fechas. ¡Vuelve pronto!
                        </h2>
                    @endif
                @endif

                <p class="text-xs font-bold text-primary opacity-25 text-center md:text-left">
                    &copy; {{ date('Y') }} Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>

</x-guest-layout>