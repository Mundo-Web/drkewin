@extends('components.public.matrix')



@section('css_improtados')
    <style>
        /* CSS Code */
        .swiper-wrapper {
            width: 100%;
            height: max-content !important;
            padding-bottom: 64px !important;
            -webkit-transition-timing-function: linear !important;
            transition-timing-function: linear !important;
            position: relative;
        }

        .swiper-pagination-bullet {
            background: #42BAE23D;
            width: 40px !important;
            border-radius: 0.75rem !important;
        }

        .swiper-pagination-bullet-active {
            background: #42BAE2 !important;
            width: 40px !important;
            border-radius: 0.75rem !important;
        }
    </style>
    <style>
        /* Estilos solo para este slider */
        #desktopSlideServicios .swiper-pagination {
            position: absolute;
            top: 0;
            right: 0;
            /* Alinea la barra a la derecha */
            width: 12px;
            /* Ajusta el ancho de la barra */
            height: 100%;
            background-color: transparent;
            /* Fondo opcional */
        }

        #desktopSlideServicios .swiper-pagination-progressbar {
            /* Ocupa todo el ancho del contenedor */
            background-color: rgba(0, 0, 0, 0.1);
            /* Fondo de la barra */
            border-radius: 6px;
            /* Bordes redondeados */
        }

        #desktopSlideServicios .swiper-pagination-progressbar-fill {
            background-color: #42BAE2;
            /* Color del progreso */
            border-radius: 6px;
            /* Bordes redondeados */
        }
    </style>
@section('content')
    <main class="flex flex-col  font-outfit ">

        <!-- Encabezado principal -->
        <section class="text-center py-8 bg-white w-11/12 mx-auto pt-32">
            <h2 class="text-text18 md:text-text24 font-semibold text-textAzul mt-8">{{ $about->titulo }}</h2>
            <h1 class="text-text32 md:text-text56 font-bold text-textAzul mt-2">{{ $about->subtitulo }}</h1>
        </section>

        <!-- Sección de contenido -->
        <section
            class="w-11/12 mx-auto mb-10  gap-8 md:h-[500px] overflow-hidden md:columns-1 lg:columns-2 lg:h-auto text-textAzul  ">
            <div>
                {!! $about->descripcion !!}
            </div>
        </section>

        <!-- Imagen del doctor Portada -->
        <section class="text-center relative z-10">
            <div class="mx-auto  w-11/12 z-40">
                <img src="{{ asset($imagenPortada->url_image) }}" alt="Dr. Kevin"
                    class=" shadow-md h-[606px] rounded-xl w-full object-cover" loading="lazy" />
            </div>
            <div class="absolute bottom-0 h-80 w-full bg-bgAzul -z-40"></div>
        </section>

        <!-- Sección de eventos -->
        <section class="py-12 bg-bgAzul text-white ">
            <div class=" mb-8 mx-auto w-11/12 md:w-10/12 text-center md:text-start">
                <h3 class="text-text24 font-semibold">Actualiza tu conocimiento en medicina</h3>
                <h4 class="text-text48 font-bold mt-2">Capacítate con Expertos Médicos</h4>
            </div>

            <!--Slide Eventos-->
            <div class="hidden md:flex relative w-10/12 mx-auto">
                <div class="swiper multiple-slide-carousel swiper-container relative" id="desktopSlideEventos">
                    <div class="swiper-wrapper ">
                        @foreach ($allEventos as $evento)
                            <div class="swiper-slide">
                                <div class="flex flex-col ">
                                    <h5
                                        class="  text-text24 font-bold bg-white text-textAzul rounded-t-lg px-6 py-4 mb-0.5 text-center">
                                        {{ $evento->nombre }}</h5>
                                    <ul class="  bg-white text-textAzul  px-6  text-text16">
                                        <li class="py-3 border-b-2"><strong class="mr-2"><i
                                                    class="fa-regular fa-calendar  mr-2"></i>
                                                Fecha:</strong>{{ \Carbon\Carbon::parse($evento->fecha)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                                        </li>
                                        <li class="py-3 border-b-2"><strong class="mr-2"><i
                                                    class="fa-regular fa-clock mr-2"></i>
                                                Hora:</strong>
                                            {{ \Carbon\Carbon::parse($evento->hora)->locale('es')->isoFormat('h:mm A') }} -
                                            {{ \Carbon\Carbon::parse($evento->hora_final)->locale('es')->isoFormat('h:mm A') }}
                                        </li>
                                        <li class="line-clamp-1 py-3 border-b-2""><strong class="mr-2"><i
                                                    class="fa-solid fa-location-dot mr-2 "></i>
                                                Lugar:</strong> {{ $evento->lugar }}</li>
                                        <li class="py-3"><strong class="mr-2"><i class="fa-solid fa-desktop mr-2"></i>
                                                Modalidad:</strong>
                                            {{ $evento->modalidad }}</li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="{{ $evento->link }}" target="__blank"
                                            class="block px-4 py-4 bg-bgCeleste text-white rounded-b-lg text-text18 font-semibold">Ver
                                            evento</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination "></div>
                </div>
            </div>
            <div class="w-11/12 mx-auto relative md:hidden">

                @foreach ($allEventos as $evento)
                    <div class="flex flex-col my-8">
                        <h5 class="text-text24 font-bold bg-white text-textAzul rounded-t-lg px-6 py-4 mb-0.5 text-center">
                            {{ $evento->nombre }}</h5>
                        <ul class="  bg-white text-textAzul  px-6  text-text16">
                            <li class="py-3 border-b-2"><strong class="mr-2"><i class="fa-regular fa-calendar  mr-2"></i>
                                    Fecha:</strong>{{ \Carbon\Carbon::parse($evento->fecha)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                            </li>
                            <li class="py-3 border-b-2"><strong class="mr-2"><i class="fa-regular fa-clock mr-2"></i>
                                    Hora:</strong>
                                {{ \Carbon\Carbon::parse($evento->hora)->locale('es')->isoFormat('h:mm A') }} -
                                {{ \Carbon\Carbon::parse($evento->hora_final)->locale('es')->isoFormat('h:mm A') }}
                            </li>
                            <li class="line-clamp-1 py-3 border-b-2""><strong class="mr-2"><i
                                        class="fa-solid fa-location-dot mr-2 "></i>
                                    Lugar:</strong> {{ $evento->lugar }}</li>
                            <li class="py-3"><strong class="mr-2"><i class="fa-solid fa-desktop mr-2"></i>
                                    Modalidad:</strong>
                                {{ $evento->modalidad }}</li>
                        </ul>
                        <div class="text-center">
                            <a href="{{ $evento->link }}" target="__blank"
                                class="block px-4 py-4 bg-bgCeleste text-white rounded-b-lg text-text18 font-semibold">Ver
                                evento</a>
                        </div>
                    </div>
                @endforeach

            </div>


        </section>
        <!------------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ------------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ---------------------------------------------->

        <!-- Sección de Rotaciones Médicas Internacionales -->

        <section class="py-12   grid grid-cols-1 lg:grid-cols-2 items-center gap-14  w-11/12 mx-auto">
            <!-- Imagen del médico -->
            <div>
                <img src="https://i.ibb.co/7p0TQVy/image.png" alt="Médico en cirugía"
                    class="rounded-xl shadow-md md:hidden lg:flex" loading="lazy" />
            </div>

            <!-- Información de Rotaciones Medicas -->
            <div class="text-gray-700 ">
                <h2 class="text-text48 font-bold text-textAzul">Rotaciones Médicas Internacionales</h2>
                <p class="mt-4 text-textAzul text-text18">Explora prácticas clínicas en el extranjero, adquiere experiencia
                    global y mejora tus habilidades en entornos diversos. Una oportunidad para crecer como médico.</p>

                <div class="mt-6 space-y-6">

                    <div class="w-full relative">
                        <div id="sliderRotaciones" class="swiper default-carousel swiper-container w-full">
                            <div class="swiper-wrapper w-full mx-auto">
                                @foreach ($allRotaciones as $rotacion)
                                    <div class="swiper-slide text-center ">
                                        <div class="flex flex-col items-center space-y-4 w-8/12 mx-auto">
                                            <div class="text-gray-100 p-3 rounded-full">
                                                <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="group">
                                                    <circle cx="26" cy="26" r="26" fill="#42BAE2"
                                                        id="firstCircle" class="group-hover:fill-bgCeleste md:duration-500">
                                                    </circle>
                                                    <path
                                                        d="M16.4004 26.2598H25.7409M26.2598 35.6004V16.4004M21.3301 23.1463V19.7734M19.6436 21.4598H23.0166M19.6436 31.449H23.0166M29.3734 28.0761H32.7463M29.3734 24.9626H32.7463M18.995 35.6004H33.0058C34.4387 35.6004 35.6004 34.4387 35.6004 33.0058V18.995C35.6004 17.562 34.4387 16.4004 33.0058 16.4004H18.995C17.562 16.4004 16.4004 17.562 16.4004 18.995V33.0058C16.4004 34.4387 17.562 35.6004 18.995 35.6004Z"
                                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" id="firstIcon"
                                                        class="group-hover:stroke-bgWhite md:duration-500"></path>
                                                </svg>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="text-textAzul font-bold text-text24">
                                                    {{ $rotacion->titulo }}
                                                </h3>
                                                <p class="mt-2 text-gray-600 text-16">{{ $rotacion->descripcion }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="absolute top-1/2 -translate-y-1/2 flex justify-between w-full px-4 z-10">
                                <button id="slider-button-left"
                                    class=" group bg-bgRosa !p-2 flex justify-center items-center border border-none !w-12 !h-12 transition-all duration-500 rounded-full hover:bg-bgAzul hover:text-white"
                                    data-carousel-prev>
                                    <i class="fa-solid fa-chevron-left fa-xl"></i>
                                </button>
                                <button id="slider-button-right"
                                    class=" group bg-bgRosa !p-2 flex justify-center items-center border border-none  !w-12 !h-12 transition-all duration-500 rounded-full hover:bg-bgAzul  hover:text-white"
                                    data-carousel-next>
                                    <i class="fa-solid fa-chevron-right fa-xl"></i>
                                </button>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>


                </div>
            </div>


        </section>

        <!-- Sección de Procedimientos Especializados -->
        <section class="py-12 bg-bgRosa  ">
            <div class="text-center mb-8">
                <h3 class="text-text18 md:text-text24 text-textAzul">Confianza y precisión siempre.</h3>
                <h2 class="text-text36 font-bold text-textAzul md:text-text48">Procedimientos Especializados a tu
                    Alcance </h2>
            </div>
            <!--Seccion Servicios-->
            <div class="w-11/12 mx-auto ">
                <div class="hidden  relative lg:flex">
                    <div id="desktopSlideServicios"
                        class="swiper vertical-slide-carousel swiper-container relative h-[450px] flex w-full gap-10">
                        <div class="swiper-wrapper">
                            @foreach ($allServicios->chunk(3) as $groupServicios)
                                <div class="swiper-slide w-10/12 clear-right">
                                    @foreach ($groupServicios as $servicio)
                                        <div
                                            class=" flex items-center justify-between border-b-2
                                     py-8 space-x-8">
                                            <div class="flex items-center justify-center space-x-4 w-9/12">
                                                <div class="ml-8 w-2/12  text-textWhite rounded-full ">
                                                    <img src="{{ $servicio->url_image }}" alt="{{ $servicio->title }}"
                                                        class="bg-bgAzul w-[90px] h-[90px] rounded-full p-1 object-cover"
                                                        loading="lazy" />
                                                </div>
                                                <div class="w-10/12 flex space-x-8 items-center justify-center">
                                                    <h4 class=" w-4/12 text-text32 font-semibold text-textAzul">
                                                        {{ $servicio->title }}</h4>
                                                    <p class="w-8/12 text-text16 text-textAzul">
                                                        {{ $servicio->extracto }}
                                                    </p>
                                                </div>
                                            </div>
                                            <x-boton-solicitar-cita :generales="$generales"></x-boton-solicitar-cita>
                                        </div>
                                    @endforeach
                                    {{-- Agrega elementos vacíos si faltan servicios para completar el grupo --}}
                                    @for ($i = count($groupServicios); $i < 3; $i++)
                                        <div class="w-full border-b-2 py-8 opacity-0"></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="relative hidden md:flex lg:hidden">
                    <div id="desktopSlideServiciosMd" class="swiper relative">
                        <div class="swiper-wrapper">
                            @foreach ($allServicios as $servicio)
                                <div class="swiper-slide">

                                    <div class="w-full border-b-2 py-8">
                                        <div class="flex gap-8 my-4 items-center">
                                            <img src="{{ $servicio->url_image }}" alt="{{ $servicio->title }}"
                                                class="bg-bgAzul w-[96px] h-[96px] rounded-full p-1" loading="lazy" />
                                            <h4 class="text-text24 font-semibold text-textAzul">{{ $servicio->title }}
                                            </h4>
                                        </div>
                                        <p class="text-text16 text-textAzul my-8">{{ $servicio->extracto }}</p>
                                        <x-boton-solicitar-cita :generales="$generales"></x-boton-solicitar-cita>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
                    </div>
                </div>
                <div class="relative md:hidden">
                    <div id="mobileSlideServicios" class="swiper relative">
                        <div class="swiper-wrapper">
                            @foreach ($allServicios->chunk(3) as $groupServicios)
                                <div class="swiper-slide">
                                    @foreach ($groupServicios as $servicio)
                                        <div class="w-full border-b-2 py-8">
                                            <div class="flex gap-8 my-4 items-center">
                                                <img src="{{ $servicio->url_image }}" alt="{{ $servicio->title }}"
                                                    class="bg-bgAzul w-[96px] h-[96px] rounded-full p-1" loading="lazy" />
                                                <h4 class="text-text24 font-semibold text-textAzul">{{ $servicio->title }}
                                                </h4>
                                            </div>
                                            <p class="text-text16 text-textAzul my-8">{{ $servicio->extracto }}</p>
                                            <x-boton-solicitar-cita :generales="$generales"></x-boton-solicitar-cita>
                                        </div>
                                    @endforeach

                                    {{-- Agrega elementos vacíos si faltan servicios para completar el grupo --}}
                                    @for ($i = count($groupServicios); $i < 3; $i++)
                                        <div class="w-full border-b-2 py-8 opacity-0"></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de imagen grupal -->
        <section class="bg-white py-16 w-11/12 mx-auto md:hidden">
            <div id="mobileSlideGaleria" class="swiper centered-slide-carousel swiper-container relative">
                <div class="swiper-wrapper">
                    @foreach ($imagesGaleria as $image)
                        <div class="swiper-slide rounded-xl overflow-hidden">
                            <img src="{{ asset($image->url_image) }}" alt="{{ $image->name_image }}"
                                class="rounded-xl shadow-lg w-full h-auto object-cover" loading="lazy" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination "></div>
            </div>
        </section>
        <!-- Sección de confianza -->
        <section class="pt-16 lg:py-16 mt-32 bg-bgRosaWeak lg:bg-white">
            <div class=" mx-auto flex gap-8 items-end w-11/12  relative flex-col md:items-center lg:flex-row ">
                <!-- Imagen del doctor -->
                <div class="order-2 lg:order-1 text-center lg:text-left lg:absolute ">
                    @if ($perfil)
                        <img src="{{ asset($perfil->url_image) }}" alt="Dr. Kewin"
                            class="mx-auto lg:mx-0 h-[500px] object-contain" loading="lazy" />
                    @else
                        <p>No hay imagen disponible para el perfil.</p>
                    @endif

                </div>
                <!-- Contenido textual -->
                <div class="w-full justify-start lg:bg-bgRosaWeak flex lg:justify-end  lg:rounded-xl order-1">
                    <div class="lg:w-4/6 lg:p-8">
                        <h2 class="text-text48 font-bold text-textAzul mb-4">{{ $about->lema }}</h2>
                        <p class="text-textAzul text-text24">{{ $about->parrafo }}</p>
                        <a target="_blank"
                            href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
                            class="bg-bgAzul mt-4 text-text18 text-white py-3 px-8 rounded-xl inline-block text-center hover:bg-bgAzulStrong md:duration-500 w-auto ">
                            Conoce a tu doctor aquí
                        </a>

                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de certificaciones -->
        <section class="py-16">
            <div class="w-11/12 mx-auto">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <!-- Contenido textual -->
                    <div>
                        <h3 class="text-text24 text-textCeleste">Estudios</h3>
                        <h2 class="text-text44 font-bold text-blue-900 text-start mb-8">Certificaciones y Reconocimientos
                            Médicos</h2>
                        <p class="text-textAzul text-text18 my-8 ">
                            {{ $about->descripcion_estudios }}
                        </p>
                        <x-boton-solicitar-cita :generales="$generales"></x-boton-solicitar-cita>
                    </div>
                    <!-- Imagen del certificado -->
                    <div class="w-full relative">
                        <di id="slideCertificaciones" class="swiper progress-slide-carousel swiper-container relative">
                            <div class="swiper-wrapper">
                                @foreach ($imagesCertificados as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image->url_image) }}" alt="{{ $image->name_image }}"
                                            class="w-full h-auto rounded-xl overflow-hidden" loading="lazy" />
                                    </div>
                                @endforeach
                            </div>

                        </di>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de imagen grupal -->
        <section class="hidden md:flex bg-white py-16 w-11/12 mx-auto ">
            <div id="desktopSlideGaleria" class="swiper centered-slide-carousel swiper-container relative">
                <div class="swiper-wrapper">
                    @foreach ($imagesGaleria as $image)
                        <div class="swiper-slide rounded-xl overflow-hidden">
                            <img src="{{ asset($image->url_image) }}" alt="{{ $image->name_image }}"
                                class="rounded-xl shadow-lg w-full h-[565px] object-cover" loading="lazy" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination "></div>
            </div>
        </section>
    </main>
@section('scripts_improtados')

    <script>
        var swiper = new Swiper("#sliderRotaciones", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,

            },
            navigation: {
                nextEl: "#sliderRotaciones #slider-button-right",
                prevEl: "#sliderRotaciones #slider-button-left",
            },
        });


        var swiper = new Swiper("#slideCertificaciones", {
            loop: true,
            fraction: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
        });
    </script>
    <script>
        var swiper = new Swiper("#desktopSlideGaleria", {
            centeredSlides: true,
            paginationClickable: true,
            loop: true,
            spaceBetween: 30,
            slideToClickedSlide: true,
            pagination: {
                el: ".centered-slide-carousel  .swiper-pagination",
                clickable: true,
            },
            slidesPerView: 1,

        });
        var swiper = new Swiper("#mobileSlideGaleria", {
            centeredSlides: true,
            paginationClickable: true,
            loop: true,
            spaceBetween: 30,
            slideToClickedSlide: true,
            pagination: {
                el: ".centered-slide-carousel .swiper-pagination",
                clickable: true,
            },
            slidesPerView: 1,

        });

        var swiper = new Swiper("#desktopSlideEventos", {
            loop: false,
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: ".multiple-slide-carousel .swiper-button-next",
                prevEl: ".multiple-slide-carousel .swiper-button-prev",
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,

                },
                // Pantallas medianas (768px o menos)
                768: {
                    slidesPerView: 2,

                },
            }
        });
        var swiper = new Swiper("#desktopSlideServiciosMd", {
            loop: false,
            slidesPerView: 2,
            spaceBetween: 20,
            navigation: {
                nextEl: ".multiple-slide-carousel .swiper-button-next",
                prevEl: ".multiple-slide-carousel .swiper-button-prev",
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

        });

        var swiper = new Swiper("#desktopSlideServicios", {
            loop: false,
            speed: 800,
            grabCursor: true,
            watchSlidesProgress: true,
            direction: "vertical",
            slidesPerView: 3,
            slidesPerGroup: 3,
            spaceBetween: 20,
            mousewheel: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: "#desktopSlideServicios .swiper-pagination",
                type: "progressbar",
                clickable: true, // Si deseas que sea clickeable
            },
        });
        var swiper = new Swiper("#mobileSlideServicios", {

            slidesPerView: 1, // Muestra un slide completo a la vez
            spaceBetween: 20, // Espacio entre slides
            loop: false, // Desactiva el loop
            watchOverflow: true, // Evita errores si hay menos slides que el necesario
            pagination: {
                el: '.swiper-pagination',

                clickable: true,
            },

        });
    </script>

@stop

@stop
