<?php
$randomImage = $imagesGaleria->random();
?>
@extends('components.public.matrix')

@section('css_improtados')
    <style>
        .servicio-item.active {
            background-color: #42BAE2;
        }

        .servicio-item.active>h3 {
            color: #ffffff;
        }

        /* ------ MODIFICACIO PARA LAS GRILLAS DE SWIPER ------- */

        .swiper-grid-column>.swiper-wrapper {
            display: flex !important;
            flex-direction: row !important;
        }

        .enfermedades .swiper-slide {
            margin-top: 0 !important;
            margin-bottom: 50px !important;
        }

        .enfermedades .swiper-pagination-grid {
            display: block;
            text-align: center;
        }

        @media (min-width: 768px) {
            .enfermedades .swiper-pagination-grid {
                display: none;
            }
        }

        /* ------------ botones de navegacion ------------------ */

        .swiper-button-next:after {
            content: "" !important;
        }

        .swiper-button-next {
            background-color: #42bae2;
            background-image: url(../../../images/svg/arrow-right-sm.svg);
            background-repeat: no-repeat;
            background-position: center;
            width: calc(var(--swiper-navigation-size) / 29 * 27) !important;
            height: 50px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            position: relative !important;
        }

        .swiper-button-prev:after {
            content: "" !important;
        }

        .swiper-button-prev {
            background-color: #d4e5fe;
            background-image: url(../../../images/svg/arrow-left-sm.svg);
            background-repeat: no-repeat;
            background-position: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            position: relative !important;
            width: calc(var(--swiper-navigation-size) / 29 * 27) !important;
        }


        .buttonSliderServicios {
            display: flex !important;
            flex-direction: row-reverse;
            justify-content: start;
            gap: 2rem;
            height: 50px;
        }

        @media (min-width: 768px) {
            .buttonSliderServicios {
                flex-direction: row-reverse;
                justify-content: start;
            }
        }

        .swiper-button-lock {
            display: block !important;
        }

        /*Estilos*/
        #servicio-description p {
            padding-bottom: 0.75rem;
        }

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
@stop
{{-- style="background-image: url({{asset('images/img/Hero_Doctor_mobile.png')}})" --}}
@section('content')
    <main class="flex flex-col gap-10 mb-10 bg-white font-outfit">
        <!--Seccion lista Especialidades-->
        <section class=" bg-white mt-4 md:mt-10 w-11/12  md:max-w-6xl mx-auto pt-32">
            <div class="">
                <div class="text-center md:text-start">
                    <h2 class="text-text32  md:text-text64 font-bold text-textAzul mb-4 text-center">
                        Conoce nuestros servicios en cirugía mínimamente invasiva
                    </h2>
                    <!--<p class="text-text18 md:text-text24 text-textCeleste mb-12 font-semibold">
                                                                                                                                                    Descubre Soluciones Personalizadas
                                                                                                                                                </p>-->
                </div>
                <!--Servicios desktop-->
                <div class="hidden md:grid  grid-cols-2 lg:grid-cols-3 gap-4" data-aos="fade-up" data-aos-offset="150">
                    @foreach ($servicios as $service)
                        <a class=" transition-all duration-300 cursor-pointer servicio-item flex flex-col justify-start  gap-5 text-textAzul bg-bgRosaWeak rounded-3xl py-16 hover:bg-bgCeleste  group relative {{ $servicio->id === $service->id ? 'active' : 'bg-bgRosaWeak ' }}"
                            data-id="{{ $service->id }}">
                            <div class="flex flex-col justify-center items-center gap-3 ">

                                <div class="relative">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($service->url_image) }}"
                                            alt="{{ substr(strrchr($service->url_image, '_'), 1) }}"
                                            class=" {{ $servicio->id === $service->id ? 'bg-bgCeleste' : 'bg-bgAzul' }} group-hover:bg-bgCeleste w-[96px] h-[96px] rounded-full p-1"
                                            loading="lazy" />
                                    </div>
                                </div>

                                <div class=" flex flex-col gap-5 text-center items-center">{{-- se agrego : items-center --}}
                                    <h3
                                        class="font-bold  text-textAzul text-text32 xl:text-text36 w-full md:w-2/3 mx-auto px-5 group-hover:text-white  {{ $servicio->id === $service->id ? 'text-white' : 'text-textAzul ' }}">
                                        {{ $service->title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!--Servicios mobile-->
                <div class="cursor-pointer block md:hidden" data-aos="fade-up" data-aos-offset="150">
                    <div class="swiper  servicios default-carousel swiper-container ">
                        <div class="swiper-wrapper">
                            @foreach ($servicios as $service)
                                <div class="swiper-slide ">
                                    <div class=" transition-all duration-300 servicio-item flex flex-col justify-start  gap-5 text-textAzul bg-bgRosa rounded-3xl py-16  group relative {{ $servicio->id === $service->id ? 'active' : 'bg-gray-100 ' }}"
                                        data-id="{{ $service->id }}">
                                        <div class="flex flex-col justify-center items-center gap-3 ">
                                            <div class="relative">
                                                <div class="flex justify-center items-center">
                                                    <img class=" {{ $servicio->id === $service->id ? 'bg-bgCeleste' : 'bg-bgAzul' }} w-[96px] h-[96px] rounded-full p-1 "
                                                        src="{{ asset($service->url_image) }}"
                                                        alt="{{ substr(strrchr($service->url_image, '_'), 1) }}"
                                                        loading="lazy" />
                                                </div>
                                            </div>

                                            <div class=" flex flex-col gap-5 text-center items-center">{{-- se agrego : items-center --}}
                                                <h3
                                                    class="font-bold text-text32 xl:text-text36 w-full md:w-2/3 mx-auto px-5 {{ $servicio->id === $service->id ? 'text-white' : 'text-textAzul ' }}">
                                                    {{ $service->title }}
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--seccion descripcion-->
        <section class=" bg-white md:mt-10 " data-aos="fade-up" data-aos-offset="150">
            <div class="w-11/12  md:max-w-6xl mx-auto ">
                <!-- Encabezado -->
                <div class="mb-8">
                    <p class="text-textCeleste  font-semibold text-text18 md:text-text24 mb-4">Servicio</p>
                    <div class="flex justify-between items-center">
                        <h1 id="servicio-title"
                            class="text-text48 text-center
                           md:text-start  md:text-text48 font-bold text-textAzul mb-4 flex
                           truncate overflow-hidden whitespace-normal text-ellipsis">
                            {{ '¿ ' . $servicio->title . ' ?' }}
                        </h1>

                        <x-boton-solicitar-cita :generales="$generales"
                            classes="bg-bgAzul hover:bg-bgAzulStrong hidden lg:flex"></x-boton-solicitar-cita>
                    </div>
                    <div id="servicio-description"
                        class="md:h-[200px] text-textAzul overflow-hidden md:columns-1 lg:columns-2 lg:h-auto gap-6  mt-4 text-text18 ">
                        {!! $servicio->description !!}
                    </div>
                </div>
                <!-- Imagen y botón -->
                <section class="bg-white " data-aos="fade-up" data-aos-offset="150">
                    <div class="swiper centered-slide-carousel swiper-container relative">
                        <div class="swiper-wrapper" id="swiperWrapperServicio">
                            @foreach ($servicioGaleria as $image)
                                <div class="swiper-slide ">
                                    <img src="{{ asset($image->url_image) }}" alt="{{ $image->name_image }}"
                                        class="rounded-xl shadow-lg w-full h-auto md:h-[565px] object-cover" loading="lazy">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination "></div>
                    </div>
                </section>
            </div>
        </section>
        <!--Seccion Beneneficios-->
        <section class=" bg-white" data-aos="fade-up" data-aos-offset="150">
            <div class="w-11/12  md:max-w-6xl mx-auto  ">
                <!-- Título y descripción -->
                <div class="text-center mb-12 md:w-1/2 mx-auto">
                    <!-- <p class="text-blue-500 font-semibold text-text18 md:text-text24">Beneficios</p>-->
                    <h2 class="text-textAzul font-bold mb-4 text-text48">Beneficios del proceso</h2>
                    <p id="servicio-extracto" class="text-textAzul leading- text-text18 ">
                        {{ $servicio->extracto }}
                    </p>
                </div>

                <!-- Beneficios -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6" data-aos="fade-up" data-aos-offset="150">
                    <!-- Beneficio 1 -->
                    <div
                        class="group
                    cursor-pointer bg-bgRosa rounded-xl p-6 shadow-xl hover:bg-bgAzul hover:text-white transition-color
                    duration-500">
                        <h3 class="text-text64 font-bold text-textCeleste mb-4 group-hover:text-textWhite">1</h3>
                        <h4 id="servicio-name_beneficio1"
                            class="text-text32 text-textAzul font-bold  mb-2 group-hover:text-textWhite">
                            {{ $servicio->name_beneficio1 }}
                        </h4>
                        <p id="servicio-description_beneficio1"
                            class="text-text18 text-textAzul leading-relaxed group-hover:text-textWhite">
                            {{ $servicio->description_beneficio1 }}
                        </p>
                    </div>

                    <!-- Beneficio 2 -->
                    <div
                        class="group cursor-pointer bg-bgRosa  rounded-xl p-6 shadow-xl  hover:bg-bgAzul hover:text-white transition-colors duration-500">
                        <h3 class="text-text64 font-bold text-textCeleste mb-4 group-hover:text-textWhite">2</h3>
                        <h4 id="servicio-name_beneficio2"
                            class="text-text32 text-textAzul font-bold  mb-2 group-hover:text-textWhite">
                            {{ $servicio->name_beneficio2 }}
                        </h4>
                        <p id="servicio-description_beneficio2"
                            class="text-text18 text-textAzul leading-relaxed group-hover:text-textWhite">
                            {{ $servicio->description_beneficio2 }}
                        </p>
                    </div>

                    <!-- Beneficio 3 -->
                    <div
                        class="group cursor-pointer bg-bgRosa  rounded-xl p-6 shadow-xl  hover:bg-bgAzul hover:text-white transition-colors duration-500">
                        <h3 class="text-text64 font-bold text-textCeleste mb-4 group-hover:text-textWhite">3</h3>
                        <h4 id="servicio-name_beneficio3"
                            class="text-text32 text-textAzul font-bold  mb-2 group-hover:text-textWhite">
                            {{ $servicio->name_beneficio3 }}
                        </h4>
                        <p id="servicio-description_beneficio3"
                            class="text-text18 text-textAzul leading-relaxed group-hover:text-textWhite">
                            {{ $servicio->description_beneficio3 }}
                        </p>
                    </div>

                    <!-- Beneficio 4 -->
                    <div
                        class="group cursor-pointer bg-bgRosa  rounded-xl p-6 shadow-xl  hover:bg-bgAzul hover:text-white transition-colors duration-500">
                        <h3 class="text-text64 font-bold text-textCeleste mb-4 group-hover:text-textWhite">4</h3>
                        <h4 id="servicio-name_beneficio4"
                            class="text-text32 text-textAzul font-bold  mb-2 group-hover:text-textWhite">
                            {{ $servicio->name_beneficio4 }}
                        </h4>
                        <p id="servicio-description_beneficio4"
                            class="text-text18 text-textAzul leading-relaxed group-hover:text-textWhite">
                            {{ $servicio->description_beneficio4 }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--Seccion Proceso-->
        <section class="flex flex-col lg:flex-row items-center w-11/12  md:max-w-6xl mx-auto mt-8   gap-6"
            data-aos="fade-up" data-aos-offset="150">
            <!-- Texto -->
            <div class="lg:w-1/2 text-start md:text-left">

                <h1 class="text-text48 leading-[44px] font-bold text-textAzul mb-4 text-center md:text-start">Proceso de
                    evaluación pre
                    operatoria</h1>
                <ol class="text-lg font-light text-textAzul list-decimal ml-12">
                    <li class="mb-4">
                        <span class="text-xl  font-semibold">Consulta especializada: </span>Valoración de sintomas,
                        condición de
                        salud previa y antecedentes
                        médicos.

                    </li>
                    <li class="mb-4">
                        <span class="text-xl  font-semibold">Examenes de diagnóstico: </span> Evaluación de estudio de
                        ecografía, resonancia magnetica o tomográfica
                        según corresponda, asi como estudios de laboratorio.

                    </li>
                    <li class="mb-4">
                        <span class="text-xl  font-semibold">Planteamiento quirúrgico: </span> Explicación del
                        procedimiento quirúrgico, beneficios, riesgos, proceso
                        de recuperación y control.

                    </li>
                    <li class="mb-4">
                        <span class="text-xl  font-semibold">Examen pre operatorio: </span> Evaluación por cardiólogia para
                        riesgo pre operatorio, evaluación por
                        anestesiólogia.

                    </li>
                    <li class="mb-8">
                        <span class="text-xl  font-semibold">Instrucción pre operatoria</span> Recomendación sobre ayuno
                        pre operatorio, suspensión de medicación y
                        proceso post quirúrgico inmediato.
                    </li>
                    <x-boton-solicitar-cita :generales="$generales"></x-boton-solicitar-cita>
                </ol>

                <!--   <h2 class="text-textCeleste text-text18 md:text-text24 font-semibold">Servicio</h2>
                                                                                                                            <h1 class="text-text48 font-bold text-textAzul mb-4 text-center md:text-start">Sobre el Proceso</h1>
                                                                                                                            <div id="servicio-process" class="text-textAzul flex flex-col text-text18 mb-4 gap-4">

                                                                                                                                    {!! $servicio->process !!}
                                                                                                                                </div>-->


            </div>

            <!-- Imagen -->
            <div class="lg:w-1/2">
                <img src="{{ asset($randomImage->url_image) }}" alt="Proceso médico"
                    class="rounded-lg shadow-lg w-full h-[720px] object-cover" loading="lazy" />
            </div>
        </section>


    </main>


@section('scripts_improtados')

    <script>
        document.addEventListener("DOMContentLoaded", () => {




            var servicios = new Swiper(".servicios", {
                slidesPerView: 1,
                spaceBetween: 20,

                grab: true,
                centeredSlides: true,
                initialSlide: 2,
                allowTouchMove: true,

                pagination: {
                    el: ".servicios .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".servicios .swiper-button-next",
                    prevEl: ".servicios .swiper-button-prev",
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.servicio-item').on('click', function(e) {
                e.preventDefault();

                // Eliminar la clase 'active' y 'bg-gray-100' de todos los elementos
                $('.servicio-item').removeClass('active bg-bgRosa');
                $('.servicio-item h3').removeClass('text-white').addClass('text-textAzul');
                $('.servicio-item img').removeClass('bg-bgCeleste').addClass('bg-bgAzul');
                // Añadir la clase 'active' al elemento clickeado y quitar 'bg-gray-100'
                $(this).addClass('active').removeClass('bg-bgRosa');
                $(this).find('h3').removeClass('text-textAzul').addClass('text-white');
                $(this).find('img').removeClass('bg-bgAzul').addClass('bg-bgCeleste');


                // Obtener el ID del servicio clickeado
                const serviceId = $(this).data('id');

                $.ajax({
                    url: `/servicio/${serviceId}`,
                    method: 'GET',
                    success: function(data) {
                        // Asumiendo que recibes los datos en formato JSON
                        const servicio = data.servicio;
                        const galeria = data.galeria;
                        // Actualiza los detalles del servicio
                        $('#servicio-title').text('¿ ' + servicio.title + ' ?');
                        $('#servicio-description').html(servicio.description);

                        $('#servicio-url_image').attr('src', servicio.url_image);
                        $('#servicio-url_image').attr('alt', servicio.name_image);
                        $('#servicio-extracto').text(servicio.extracto);
                        $('#servicio-name_beneficio1').text(servicio.name_beneficio1);
                        $('#servicio-description_beneficio1').text(servicio
                            .description_beneficio1);
                        $('#servicio-name_beneficio2').text(servicio.name_beneficio2);
                        $('#servicio-description_beneficio2').text(servicio
                            .description_beneficio2);
                        $('#servicio-name_beneficio3').text(servicio.name_beneficio3);
                        $('#servicio-description_beneficio3').text(servicio
                            .description_beneficio3);
                        $('#servicio-name_beneficio4').text(servicio.name_beneficio4);
                        $('#servicio-description_beneficio4').text(servicio
                            .description_beneficio4);
                        $('#servicio-process').html(servicio.process);

                        updateSwiperGallery(galeria);

                    },
                    error: function(xhr) {
                        console.error('Error al obtener los detalles del servicio:', xhr);
                    }
                });
            });

        });

        // Función para actualizar las imágenes en el swiper
        function updateSwiperGallery(images) {
            // Vaciamos el contenedor actual de imágenes
            $('#swiperWrapperServicio').empty();


            // Iteramos sobre las nuevas imágenes y las agregamos al swiper
            images.forEach(function(image) {
                const imgElement = `
                                    
                                     <div class="swiper-slide ">
                                    <img src="${image.url_image}" alt="${image.name_image}"
                                        class="rounded-xl shadow-lg w-full h-auto md:h-[565px] object-cover" loading="lazy">
                                </div>
                `;
                $('#swiperWrapperServicio').append(imgElement);
            });

            // Re-inicializar el swiper para que reconozca las nuevas imágenes
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            });
        }
    </script>
    <script>
        var swiper = new Swiper(".centered-slide-carousel", {
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
    </script>
@stop

@stop
