@extends('components.public.matrix')

@section('css_improtados')
    <style>
        .image-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            /* Ancho máximo para el contenedor */
        }





        

        .img-container {
            position: relative;
            width: 100%;
        }

        .img-container img {
            width: 100%;
            height: auto;
        }

        .logo-container {
            position: absolute;
            bottom: 12px;
            left: 58px;
            transform: translate(-50%, 50%);
            -webkit-transform: translate(-50%, 50%);
            -moz-transform: translate(-50%, 50%);
            -ms-transform: translate(-50%, 50%);
            -o-transform: translate(-50%, 50%);
            /*Centrarrespectoalaesquinainferiorizquierda*/
        }

        .logo-container img {
            width: 100%;
            /* Ancho relativo al contenedor padre (.image-container) */
            height: auto;
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

        /* -------- transparencia ---------------- */

        .bg-indice {
            background-color: rgba(249, 249, 249, 0.8);
            /* Color de fondo con opacidad */
            backdrop-filter: blur(4px);
            /* Efecto de desenfoque en el fondo */
        }

        /* --------------- flip card --------- */
        .contenedor {
            height: 100%;
            /* Ajustar altura al contenedor padre */
            position: relative;
        }

        .flip {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            perspective: 1200;
        }

        .card {
            display: flex;
            transition: all 0.5s;
            transform-style: preserve-3d;
        }

        .front,
        .back {
            backface-visibility: none;
            -webkit-backface-visibility: none;
        }

        .back {
            transform: rotateY(-180deg);
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
        }

        .card.flipCard {
            transform: rotateY(-180deg);
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
        }

        /* --- alerta --- */

        .alerta {
            color: white;
            font-weight: bold;
            font-size: 16px;
            font-family: "Outfit";
            border-radius: 1rem;
            background-color: red;
            text-align: center;
            padding: 0.6rem;
            margin-top: 1rem;
            -webkit-border-radius: 1rem;
            -moz-border-radius: 1rem;
            -ms-border-radius: 1rem;
            -o-border-radius: 1rem;
        }

        /* --------------------- deslizante ------------------- */
        ul {
            display: flex;
            flex-direction: column;

            gap: 30px;
        }

        ul li {
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Progress Div Css  */

        ul li .progress {
            border-radius: 50%;

            margin: 14px 0;

            width: 100%;

            position: relative;
            cursor: pointer;
        }

        .progress::after {
            content: "";

            position: absolute;
            width: 5px;

            height: 268px;
            /* 210 */
            top: -184px;
            /* 150 */
            left: 23px;
            background-color: #f8f2f2;

            z-index: -1;
        }

        .one::after {
            width: 0;
            height: 0;
        }

        /* Active Css  */

        li .active::after {
            background-color: #42bae2;
        }

        /* Responsive Css  */



        @media (min-width: 340px) {
            .progress::after {
                height: 322px;
                top: -286px;
            }
        }


        @media (min-width: 375px) {
            .progress::after {
                height: 290px;
                top: -266px;
            }
        }

        @media (min-width: 400px) {
            .progress::after {
                height: 290px;
                top: -245px;
            }
        }

        @media (min-width: 460px) {
            .progress::after {
                height: 266px;
                top: -215px;
            }
        }

        @media (min-width: 640px) {
            .progress::after {
                height: 220px;
                top: -200px;
            }
        }

        @media (min-width: 768px) {
            .progress::after {
                height: 344px;
                top: -305px;
            }
        }

        @media (min-width: 1024px) {
            .progress::after {
                height: 250px;
                top: -200px;
            }
        }

        @media (min-width: 1280px) {
            .progress::after {
                height: 250px;
                top: -210px;
            }
        }

        @media (min-width: 1920px) {
            .progress::after {
                height: 250px;
                top: -195px;
            }
        }

        @keyframes moveLeftAndBack {
            0% {
                left: 20%;
                /* Empieza y termina en la posición original */
                opacity: 1;
                /* Opacidad completa */
            }

            50% {
                left: -25%;
                /* Mueve hacia la izquierda fuera del borde */
                /* opacity: 0; */
            }

            100% {
                left: 20%;
                opacity: 1;
            }
        }

        /* Animación para la segunda imagen */
        @keyframes moveRightAndBack {
            0% {
                left: 50%;
                /* Empieza y termina en la posición original */
                opacity: 1;
                /* Opacidad completa */
            }

            50% {
                left: 75%;
                /* Mueve hacia la derecha fuera del borde */
                /* opacity: 0;  */
            }

            100% {
                left: 50%;
                opacity: 1;
            }
        }

        /* Aplicación de las animaciones a las imágenes */
        .myBox:nth-child(1) {
            animation: moveLeftAndBack 3s infinite;

            -webkit-animation: moveLeftAndBack 3s infinite;
        }

        .myBox:nth-child(2) {
            animation: moveRightAndBack 3s infinite;
            -webkit-animation: moveRightAndBack 3s infinite;
        }

        .testimonios .swiper-slide {
            overflow: hidden;
        }

        /* ---- */

        .contenedor_video {
            background-color: rgba(249, 249, 249, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem;
        }

        @media (min-width: 768px) {
            .contenedor_video {
                padding: 1.5rem;
            }
        }

        [type='text'],
        input:where(:not([type])),
        [type='email'],
        [type='url'],
        [type='password'],
        [type='number'],
        [type='tel'],
        textarea {
            font-size: inherit;
        }

        .bg__image-header {
            background-image: url({{ asset('images/img/Hero_Doctor_mobile_2.png') }});
        }

        @media (min-width: 768px) {
            .bg__image-header {
                background-image: url({{ asset('images/img/Hero_Doctor_2.png') }});
            }

        }
    </style>

@stop
{{-- style="background-image: url({{asset('images/img/Hero_Doctor_mobile.png')}})" --}}
@section('content')
    <main class="flex flex-col gap-20 font-outfit">
        <section class="bg__image-header bg-cover bg-center bg-no-repeat sm:w-full h-full pt-24 md:pt-32">
            <div class="flex flex-col items-center lg:flex-row gap-10 md:gap-32 w-11/12 mx-auto text-textWhite mt-12 lg:items-start"
                data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col gap-10 basis-1/2 justify-center ">
                    <div class="flex flex-col gap-8 md:gap-5">
                        <h1 class="font-bold text-[50px] md:text-text36 2md:text-text64 leading-none 2md:leading-tight">
                            <!-- {{ $generales->title1 }} --> <!-- Explora un Nuevo Horizonte de Salud con el Dr. Kewin -->
                            <!-- Explora un Nuevo Horizonte de Salud con el Dr. Kewin -->
                            Explore una atención personalizada en cirugía con nuestro equipo
                            <!--  Explore una atención personalizada en cirugía con nuestro equipo -->
                        </h1>
                        <p class="font-medium text-text18 xl:text-text22">
                            {{ $generales->description }}
                        </p>
                    </div>
                    <div
                        class="font-semibold text-text18 xl:text-text22 flex flex-col md:flex-row items-center justify-start gap-5">
                        <a target="_blank"
                            href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
                            class="bg-bgCeleste py-3 px-5 rounded-xl inline-block text-center hover:bg-bgCelesteStrong md:duration-500 w-full md:w-auto">
                            Solicitar una cita
                        </a>

                        <!-- <a href="#imc"
                            class="bg-bgWhiteWeak text-textAzul py-3 px-8 rounded-xl inline-block text-center w-full md:w-auto">
                            Calcula tu IMC
                        </a> -->
                    </div>

                    <div class="flex flex-col gap-5">
                        <div class="flex gap-2">
                            <div>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 8.5C4.5 8.5 4.5 10.5 6 10.5L8.00052 10.5C8.5528 10.5 9 10.9445 9 11.4968V21C9 22.5 11 22.5 11 21C11 19.5 11 16.5 12 16.5C13 16.5 13 19.5 13 21C13 22.5 15 22.5 15 21V11.5C15 10.9477 15.4477 10.5 16 10.5H18C19.5 10.5 19.5 8.5 18 8.5H6Z"
                                        stroke="white" stroke-linecap="round" />
                                    <path
                                        d="M14 5C14 6.10457 13.1046 7 12 7C10.8954 7 10 6.10457 10 5C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z"
                                        stroke="white" />
                                </svg>
                            </div>
                            <h2 class="font-medium text-text18 xl:text-text22">
                                Cirugía segura
                            </h2>
                        </div>

                        <div class="flex gap-2">
                            <div>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 8.5C4.5 8.5 4.5 10.5 6 10.5L8.00052 10.5C8.5528 10.5 9 10.9445 9 11.4968V21C9 22.5 11 22.5 11 21C11 19.5 11 16.5 12 16.5C13 16.5 13 19.5 13 21C13 22.5 15 22.5 15 21V11.5C15 10.9477 15.4477 10.5 16 10.5H18C19.5 10.5 19.5 8.5 18 8.5H6Z"
                                        stroke="white" stroke-linecap="round" />
                                    <path
                                        d="M14 5C14 6.10457 13.1046 7 12 7C10.8954 7 10 6.10457 10 5C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z"
                                        stroke="white" />
                                </svg>
                            </div>
                            <h2 class="font-medium text-text18 xl:text-text22">
                                Rápida recuperación
                            </h2>
                        </div>

                        <div class="flex gap-2">
                            <div>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 8.5C4.5 8.5 4.5 10.5 6 10.5L8.00052 10.5C8.5528 10.5 9 10.9445 9 11.4968V21C9 22.5 11 22.5 11 21C11 19.5 11 16.5 12 16.5C13 16.5 13 19.5 13 21C13 22.5 15 22.5 15 21V11.5C15 10.9477 15.4477 10.5 16 10.5H18C19.5 10.5 19.5 8.5 18 8.5H6Z"
                                        stroke="white" stroke-linecap="round" />
                                    <path
                                        d="M14 5C14 6.10457 13.1046 7 12 7C10.8954 7 10 6.10457 10 5C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z"
                                        stroke="white" />
                                </svg>
                            </div>
                            <h2 class="font-medium text-text18 xl:text-text22">
                                Menor dolor post operatorio
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="image-container flex justify-center items-center basis-1/2 relative md:mt-24"><!-- md:mt-24 - mt-12  xl:mt-32-->
                    <div class="hidden md:flex flex-col justify-end h-full items-end">
                        <img src="{{ asset('images/img/doctor_kewin_2.png') }}" alt="doctor Kewin" class="w-[95%]">
                    </div>
                    <div class="relative md:absolute bottom-0">
                        <img src="{{ asset('images/img/doctor_kewin_1.png') }}" alt="doctor kevin" class="h-full w-full">
                    </div>
                </div>
            </div>

            <div class="md:mt-32" id="servicios">
                <div
                    class="swiper especialidades bg-bgCeleste font-semibold text-text18 md:text-text28 text-center text-textWhite">
                    <div class="swiper-wrapper py-4 items-center">

                        @foreach ($titulos as $titulo)
                            <div class="swiper-slide">
                                <p>{{ $titulo->name }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-10 w-11/12 mx-auto" data-aos="fade-up" data-aos-offset="150">
            <div class="flex flex-col gap-3 text-center">
                <h3 class="font-semibold text-textCeleste text-text24 xl:text-text28 leading-none md:leading-tight">
                    Descubre nuestros métodos avanzados
                </h3>
                <h2 class="font-bold text-textAzul text-text48 md:text-text64 leading-none md:leading-tight">
                    Cirugía Especializada para tu Bienestar
                </h2>
            </div>

            <div class="hidden md:grid grid-cols-2 lg:grid-cols-3 gap-10 ">
                @foreach ($servicios as $servicio)
                    <div class="flex flex-col justify-start  gap-5 text-textAzul bg-bgRosa rounded-3xl py-16  group relative">
                        <div class="flex flex-col justify-center items-center gap-3 ">

                            <div class="relative">
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset($servicio->url_image) }}"
                                        alt="{{ substr(strrchr($servicio->url_image, '_'), 1) }}" class="w-[96px] h-[96px] rounded-full">
                                </div>
                            </div>

                            <div class=" flex flex-col gap-5 text-center items-center">{{-- se agrego : items-center --}}
                                <h2 class="font-bold text-text32 xl:text-text36 w-full md:w-2/3 mx-auto px-5">
                                    {{ $servicio->title }}
                                </h2>
                                <p class="font-medium text-text16 xl:text-text20 px-5">
                                    {!! $servicio->extracto !!}<!-- {!! Str::limit($servicio->extracto, 250) !!} -->
                                </p>

                                <div class="flex justify-center items-center absolute -bottom-[25px] md:w-auto">
                                    <a href="{{ route('servicios', $servicio->id) }}"
                                        class="bg-bgCeleste py-3 px-10 rounded-xl inline-block text-center text-textWhite font-semibold text-text16 xl:text-text20 w-full md:w-auto group-hover:bg-bgAzul md:duration-500">
                                        Ver más
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="block md:hidden">
                <div class="swiper  enfermedades ">
                    <div class="swiper-wrapper">
                        @foreach ($servicios as $servicio)
                        <div class="swiper-slide">
                            <div class="flex flex-col justify-start  gap-5 text-textAzul bg-bgRosa rounded-3xl py-16  group relative">
                                <div class="flex flex-col justify-center items-center gap-3 ">
        
                                    <div class="relative">
                                        <div class="flex justify-center items-center">
                                            <img src="{{ asset($servicio->url_image) }}"
                                                alt="{{ substr(strrchr($servicio->url_image, '_'), 1) }}" class="w-[96px] h-[96px] rounded-full">
                                        </div>
                                    </div>
        
                                    <div class=" flex flex-col gap-5 text-center items-center">{{-- se agrego : items-center --}}
                                        <h2 class="font-bold text-text32 xl:text-text36 w-full md:w-2/3 mx-auto px-5">
                                            {{ $servicio->title }}
                                        </h2>
                                        <p class="font-medium text-text16 xl:text-text20 px-5">
                                            {!! $servicio->extracto !!}<!-- {!! Str::limit($servicio->extracto, 250) !!} -->
                                        </p>
        
                                        <div class="flex justify-center items-center absolute -bottom-[25px] md:w-auto">
                                            <a href="{{ route('servicios', $servicio->id) }}"
                                                class="bg-bgCeleste py-3 px-10 rounded-xl inline-block text-center text-textWhite font-semibold text-text16 xl:text-text20 w-full md:w-auto group-hover:bg-bgAzul md:duration-500">
                                                Ver más
                                            </a>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </section>

        <section class="bg-bgAzul text-textWhite" id="acerca">
            <div class="relative py-12 md:pt-20  w-11/12 mx-auto xs:pb-[120px] 2xs:pb-[126px] sm:pb-[280px] lg:pb-[350px] xl:pb-[285px] 2xl:pb-[400px] flex flex-col items-center"
                data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col xl:flex-row gap-6 xl:gap-20">
                    <div class="md:basis-1/2 flex flex-col gap-4">
                        <p class="font-medium text-text24">
                            <!-- Conoce al Dr. Kewin Quispe de la Roca --> Conoce al Dr. Kewin Quispe de la Roca
                        </p>
                        <h2 class="font-bold text-[40px] md:text-text56  leading-tight">
                            <!-- Explora el Mundo de la Gastroenterología con el Dr. Kewin -->
                            Su compromiso con la seguridad y la calidad en cada procedimiento asegura el éxito en tu cirugía.

                        </h2>
                    </div>
                    <div class="md:basis-1/2 flex flex-col gap-4">
                        <p class="font-medium text-text16 xl:text-text22 text-justify">
                            El Dr. Quispe de la Roca ha construido una carrera basada en una formación académica rigurosa y una amplia experiencia quirúrgica. Su enfoque centrado en el paciente ofrece una atención personalizada que considera las necesidades y preocupaciones únicas de cada persona. 

                        </p>

                        <p class="font-medium text-text16 xl:text-text22 text-justify">
                            Su habilidad para comunicar claramente los procedimientos y expectativas hace que los pacientes se sientan seguros y apoyados. Está dedicado a brindar un cuidado integral que abarca desde la evaluación inicial hasta la recuperación postoperatoria.
                        </p>

                        <p class="font-medium text-text16 xl:text-text22 text-justify">
                            Su dedicación y habilidades excepcionales lo convierten en el especialista ideal para guiarte hacia tu bienestar.
                        </p>
                    </div>
                </div>

                <div
                    class="flex justify-center items-center absolute xs:-bottom-[110px] 2xs:-bottom-[102px] sm:-bottom-[160px] md:-bottom-[190px] 3md:-bottom-[220px] xl:-bottom-[290px] 2xl:-bottom-[290px] w-full">
                    <div class="relative contenedor_video">
                        {{-- <p>{{$texto_despues_igual = substr(strrchr($generales->title2, '='), 1);}}</p>
                        <p>{{$texto_despues_igual}}</p> --}}
                        <iframe src="https://www.youtube.com/embed/{{ substr(strrchr($generales->title2, '='), 1) }}"
                            title="YouTube video player" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                            class="w-full aspect-video  sm:w-[500px] sm:h-[283px]  md:w-[500px] md:h-[282px] lg:w-[800px] lg:h-[450px] 2xl:w-[1000px] 2xl:h-[565px]"></iframe>
                        <!-- h-[200px] sm:w-[500px] sm:h-[400px] md:w-[500px] md:h-[400px] lg:w-[800px] lg:h-[500px] 2xl:w-[1000px] 2xl:h-[600px] -->
                    </div>
                </div>
            </div>

            <div class="bg-bgCeleste pt-[126px] md:pt-[180px] 3md:pt-[200px] lg:pt-[268px] xl:pt-[280px] 2xl:pt-[350px]">
                <div class="w-11/12 mx-auto flex flex-col md:flex-row justify-center text-center items-start sm:pt-[90px] pb-10  md:pt-20 lg:pb-20 lg:px-20 lg:pt-10"
                    data-aos="fade-up" data-aos-offset="150">
                    <div class="flex-1">
                        <p class="font-bold text-text68 xl:text-text72">300+</p>
                        <p class="font-medium text-text18 xl:text-text22">
                            Operaciones Atendidas
                        </p>
                    </div>
                    <div
                        class="flex-1 border-t-4 border-b-4 md:border-r-4 md:border-l-4 md:border-b-0 md:border-t-0 border-white w-full flex flex-col items-start md:items-center mt-5 pb-5 md:mt-0 md:pb-0">
                        <p class="font-bold text-text68 xl:text-text72">1K+</p>
                        <p class="font-medium text-text18 xl:text-text22">
                            Pacientes satisfechos
                        </p>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-text68 xl:text-text72">1K+</p>
                        <p class="font-medium text-text18 xl:text-text22">
                            Consultas atendidas
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="proceso">
            <div class="flex flex-col md:flex-row w-11/12 mx-auto gap-10">
                <div class="basis-1/2 order-2 md:order-1 flex flex-col justify-between" data-aos="fade-up"
                    data-aos-offset="150">
                    <h2 class="text-textCeleste font-semibold text-text24 xl:text-text28">
                        Proceso de una intervención quirúrgica
                    </h2>
                    <h2 class="font-bold text-text48 xl:text-text52 text-textAzul leading-none md:leading-tight py-5">
                        ¿Qué necesito para ser candidato a una Cirugía?
                    </h2>
                    <p class="font-medium text-text18 xl:text-text22 text-textAzul" data-aos="fade-up"
                        data-aos-offset="150">
                        Para ser candidato a una cirugía, necesitas una evaluación médica completa, estudios diagnósticos, y evaluaciones preoperatorias para asegurar que estás en condiciones óptimas y bien informado sobre el procedimiento quirúrgico indicado. Aquí te cuento todo el proceso.
                    </p>

                    <ul class="text-textAzul" data-aos="fade-up" data-aos-offset="150">
                        <li class="flex items-center py-5">
                            <div class="progress one">
                                <div class="flex gap-5 items-start">
                                    {{-- items-center --}}
                                    <div class="pt-1">
                                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="group">
                                            <circle cx="26" cy="26" r="26" fill="#42BAE2" id="firstCircle"
                                                class="group-hover:fill-bgCeleste md:duration-500" />
                                            <path
                                                d="M16.4004 26.2598H25.7409M26.2598 35.6004V16.4004M21.3301 23.1463V19.7734M19.6436 21.4598H23.0166M19.6436 31.449H23.0166M29.3734 28.0761H32.7463M29.3734 24.9626H32.7463M18.995 35.6004H33.0058C34.4387 35.6004 35.6004 34.4387 35.6004 33.0058V18.995C35.6004 17.562 34.4387 16.4004 33.0058 16.4004H18.995C17.562 16.4004 16.4004 17.562 16.4004 18.995V33.0058C16.4004 34.4387 17.562 35.6004 18.995 35.6004Z"
                                                stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" id="firstIcon"
                                                class="group-hover:stroke-bgWhite md:duration-500" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-text24 xl:text-text28">
                                            Evaluación Inicial Especializada
                                        </h3>

                                        <p class="font-normal text-text16 xl:text-text20">
                                            Necesitas una evaluación médica completa, incluyendo historia clínica, examen físico y estudios diagnósticos para determinar tu estado de salud general y específico.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex items-center py-5">
                            <div class="progress two">
                                <div class="flex gap-5 items-start">
                                    <div data-aos="fade-up" data-aos-offset="150" class="pt-1">
                                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="group">
                                            <circle cx="26" cy="26" r=" 26" fill="#F8FBFD"
                                                id="secondCircle" class="group-hover:fill-bgCeleste md:duration-500" />
                                            <path
                                                d="M25.9996 35.5554H19.9996C18.6741 35.5554 17.5996 34.4809 17.5996 33.1554L17.5997 18.7555C17.5997 17.43 18.6742 16.3555 19.9997 16.3555H30.8C32.1255 16.3555 33.2 17.43 33.2 18.7555V22.9555M29.6 30.0131C29.6 28.7164 30.6745 27.6652 32 27.6652C33.3255 27.6652 34.4 28.7164 34.4 30.0131C34.4 31.3098 33.3255 32.3609 32 32.3609M32 35.6456V35.5554M21.8 21.1555H29M21.8 24.7555H29M21.8 28.3555H25.4"
                                                stroke="#66AAD8" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" id="secondIcon"
                                                class="group-hover:stroke-strokeWithe md:duration-500" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h3 class="font-bold text-text24 xl:text-text28">
                                            Evaluación Preoperatoria
                                        </h3>

                                        <p class="font-normal text-text16 xl:text-text20">
                                            Requiere consultas con especialistas en cardiología y anestesiología, además de pruebas sanguíneas adicionales para asegurar que estás en condiciones óptimas para la cirugía.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="flex items-center py-5">
                            <div class="progress three">
                                <div class="flex gap-5 items-start">
                                    <div data-aos="fade-up" data-aos-offset="150" class="pt-1">
                                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="group">
                                            <circle cx="26" cy="26" r="26" fill="#F8FBFD"
                                                id="thirdsCircle" class="group-hover:fill-bgCeleste md:duration-500" />
                                            <path
                                                d="M18.5 24.5H17V33.5C17 34.3284 17.6716 35 18.5 35H33.5C34.3284 35 35 34.3284 35 33.5V24.5H33.5M18.5 24.5L26 29L33.5 24.5M18.5 24.5V20C18.5 18.3431 19.8431 17 21.5 17H30.5C32.1569 17 33.5 18.3431 33.5 20V24.5"
                                                stroke="#66AAD8" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" id="thirdsIcon"
                                                class="group-hover:stroke-strokeWithe md:duration-500" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h3 class="font-bold text-text24 xl:text-text28">
                                            Intervención y recuperación
                                        </h3>

                                        <p class="font-normal text-text16 xl:text-text20">
                                            La cirugía se programará una vez que se hayan cumplido todos los requisitos previos, asegurando una información clara y adecuada respecto a la cirugía, seguido de un plan de recuperación adecuado.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="font-semibold text-text18 xl:text-text22">
                        <a target="_blank"
                            href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
                            class="bg-bgCeleste py-3 px-5 rounded-xl inline-block text-center hover:bg-bgCelesteStrong md:duration-500 w-full 2md:w-auto text-textWhite">Solicitar
                            una cita</a>
                    </div>
                </div>
                <div class="basis-1/2 flex justify-center items-center order-1 md:order-2">
                    <img src="{{ asset('images/img/nueva_imagen_que.jpg') }}" class="h-full object-cover" alt="cirugía de obesidad" /> {{-- aquir --}}
                    {{-- <img src="{{ asset('images/img/image_imc.png') }}" alt="imc" class="h-full"/> --}}
                </div>
            </div>
        </section>

        <section id="imc">

            <div class="bg-bgRosaWeak" data-aos="fade-up" data-aos-offset="150">
                <div class="flex flex-col lg:flex-row w-11/12 mx-auto py-10 md:p-10 gap-12 md:gap-24">
                    <div class="basis-1/2 contenedor w-full">
                        <div class="flip ">
                            <div class="card">
                                <div class="front bg-indice h-auto rounded-3xl p-5">
                                    <div class="flex flex-col gap-5 justify-center items-center front">
                                        <div class="flex flex-col gap-4 w-full">
                                            <label for="peso"
                                                class="text-textAzul font-medium text-text14 xl:text-text18">
                                                Peso (kg):
                                            </label>
                                            <input type="number" id="peso" step="1" placeholder="00 kg"
                                                class="bg-white w-full py-4 rounded-lg px-2 peso" />
                                        </div>
                                        <div class="flex flex-col gap-4 w-full">
                                            <label for="altura"
                                                class="text-textAzul font-medium text-text14 xl:text-text18">
                                                Altura (mts):
                                            </label>
                                            <input type="number" id="altura" step="1" placeholder="00 mts"
                                                class="bg-white w-full py-4 rounded-lg px-2 altura" />
                                        </div>
                                        <!-- <div></div> -->

                                        <div class="w-full">
                                            <button type="button"
                                                class="bg-bgAzul py-4 px-20 rounded-xl inline-block text-center hover:bg-blue-500 md:duration-500 w-full text-textWhite onButton1 font-semibold text-text18 xl:text-text22 btnCalcular">
                                                Calcular
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="back bg-indice hidden h-auto rounded-3xl p-5">
                                    <div class="flex flex-col items-center justify-center gap-10">
                                        <div class="bg-white p-10 rounded-lg flex flex-col gap-5 text-center w-full">
                                            <p class="uppercase font-medium text-text22 xl:text-text26 text-textAzul">
                                                IMC
                                            </p>
                                            <p class="font-bold text-text64 xl:text-text68 text-textAzul resultado"></p>
                                        </div>
                                        <div class="w-full">
                                            <button type="button"
                                                class="bg-bgAzul py-4 rounded-xl text-center hover:bg-blue-500 md:duration-500 w-full text-textWhite font-semibold text-text18 xl:text-text22 btnRegresar px-5">
                                                Calcular de nuevo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Agregar alerta -->
                            <!-- <p class="alerta">Hubo un error, vuelva a intentarlo</p> -->
                        </div>

                        <div class="flex justify-center items-center">
                            <img src="{{ asset('images/img/image_imc.png') }}" alt="imc" />
                            {{-- <img src="{{ asset('images/img/image_imc.png') }}" alt="imc" /> --}}
                           {{--  <img src="{{ asset('images/img/imc_nueva_imagen.jpg') }}" alt="imc" class="w-[488px] h-[720px]"/> --}}
                        </div>
                    </div>

                    <div class="basis-1/2 flex flex-col gap-5 justify-center">
                        <p class="text-textAzul font-medium text-text20 xl:text-text24">
                            ¡Tu camino hacia una vida más saludable comienza ahora!
                        </p>
                        <h2
                            class="font-bold text-text48 xl:text-text52 text-textAzul leading-none md:leading-tight mb-2 md:mb-0">
                            Calcula tu índice de Masa Corporal (IMC)
                        </h2>

                        <div class="flex flex-col gap-5">
                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc0">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#66FF66" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu <b>Índice de Masa Corporal</b> (IMC) es inferior a
                                    18.5, se considera que tienes bajo peso.
                                </p>
                            </div>

                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc1">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#66FF66" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu IMC se encuentra en el rango de 18.5 a 24.9, estás
                                    dentro de los límites considerados como normales.
                                </p>
                            </div>

                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc2">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#66FF66" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu IMC cae en el intervalo de 25 a 29.9, se considera  sobrepeso.
                                </p>
                            </div>

                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc3">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#FF6666" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu IMC se encuentra en el rango de 30.0 a 34.9, se
                                    considera obesidad leve.
                                </p>
                            </div>

                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc4">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#FF6666" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu IMC oscila entre 35.0 y 39.9, se considera obesidad moderada.
                                </p>
                            </div>

                            <div class="flex gap-5 p-2 rounded-lg imcItems" id="imc5">
                                <div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="12" fill="#FF6666" />
                                    </svg>
                                </div>
                                <p class="font-medium text-text18 xl:text-text22 text-textAzul imcpInfo leading-none">
                                    Si tu IMC es superior a 40, se considera obesidad severa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-11/12 mx-auto">
                <div class="swiper testimonios text-textAzul" data-aos="fade-up" data-aos-offset="150">
                    <div class="swiper-wrapper">

                        @foreach ($testimonios as $testimonio)
                            <div class="swiper-slide">
                                <div class="flex flex-col lg:flex-row gap-16 md:gap-32 items-center">
                                    <div class="flex flex-col gap-10 basis-1/2 justify-center">
                                        <div class="buttonSliderServicios">
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>

                                        <p class="font-semibold text-text32 md:text-text40">
                                            {{ $testimonio->testimonie }}
                                        </p>

                                        <div class="flex gap-5 items-center">
                                            <div>
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="8" fill="#42BAE2" />
                                                    <path
                                                        d="M16 44V34.9893C16 30.7189 16.9978 27.3452 18.9934 24.8683C21.0171 22.3915 23.9543 20.7687 27.805 20V24.4413C24.9381 25.3523 23.0127 26.9181 22.029 29.1388C21.5231 30.306 21.3123 31.516 21.3966 32.7687H28.0158V44H16ZM47.7892 24.4413C44.9504 25.3238 43.0391 26.9181 42.0553 29.2242C41.4932 30.4484 41.2683 31.6299 41.3808 32.7687H48V44H35.9842V34.9893C35.9842 30.6619 37.0101 27.274 39.0619 24.8256C41.1419 22.3772 44.0509 20.7687 47.7892 20V24.4413Z"
                                                        fill="white" />
                                                </svg>
                                            </div>

                                            <div>
                                                <p class="font-semibold text-text18 xl:text-text22">
                                                    {{ $testimonio->name }}
                                                </p>
                                                <p class="font-normal text-text14 xl:text-text18">
                                                    {{ $testimonio->ocupation }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center">
                                        <div class="relative w-[200px] md:w-[400px] h-[300px] md:h-[600px]">


                                            <img src="{{ $testimonio->url_image_antes }}"
                                                class="h-[200px] md:h-[400px] absolute opacity-50 md:left-1/3 myBox"
                                                alt="testimonios" />

                                            <img src="{{ $testimonio->url_image_posterior }}"
                                                class="h-[200px] md:h-[400px] absolute top-1/4 left-1/4 md:left-1/2 z-[1] myBox"
                                                alt="testimonios" />


                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <section class="bg-bgRosaWeak">
            <div class="flex flex-col gap-10 text-textAzul w-11/12 mx-auto py-10" data-aos="fade-up"
                data-aos-offset="150">
                <div class="flex flex-col 2md:flex-row gap-10">
                    <div class="flex flex-col-reverse 2md:flex-col basis-1/2 gap-4">
                        <p class="font-medium text-text24">
                            El Dr. Kewin Quipe de la Roca mantiene una actualización constante
                        </p>
                        <h1 class="font-bold text-text36 xl:text-text52 leading-none md:leading-tight">
                            Miembro de las sociedades de 
                            cirugía especializada más prestigiosas

                        </h1>
                    </div>

                    <div class="basis-1/2 w-full 2md:w-[200px] flex items-center">
                        <div class="swiper logosHospitales">
                            <div class="swiper-wrapper">

                                @foreach ($logos as $logo)
                                    <div class="swiper-slide">
                                        <div class="flex justify-center items-center">
                                            <img src="{{ asset($logo->url_image) }}" alt="Apebem" class="w-[217px] h-[122px]"/>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <a target="_blank"
                        href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
                        class="bg-bgAzul py-4 px-10 rounded-xl inline-block text-center hover:bg-blue-500 md:duration-500 w-full 2md:w-auto text-textWhite text-text18 xl:text-text22 font-semibold">
                        Solicitar una cita
                    </a>
                </div>
            </div>
        </section>

        <section id="formulario">
            <div class="flex flex-col lg:flex-row lg:w-full mx-auto md:gap-10" data-aos="fade-up" data-aos-offset="150">
                <div class="basis-1/2 order-2 lg:order-1">
                    <div class="w-full">
                      {{--   <img src="{{ asset('images/img/doctor.png') }}" class="h-full" alt="doctor kewin" /> --}}
                        {{-- <img src="{{ asset('images/img/Foto_desktop.png') }}" class=" hidden lg:block" alt="doctor kewin" />
                        <img src="{{ asset('images/img/Foto_mobile.png') }}" class="h-full block lg:hidden" alt="doctor kewin" /> --}}
                        <img src="{{ asset('images/img/doctor_2.png') }}" class="w-full object-cover" alt="doctor kewin" />
                    </div>
                </div>
                <div class="basis-1/2 flex flex-col gap-5 order-1 lg:order-2 justify-center pb-10 md:pb-0  w-11/12 mx-auto lg:pr-10">
                    <p class="text-textCeleste font-semibold text-text24">
                        Contáctanos
                    </p>
                    <div class="w-full md:w-9/12 xl:w-9/12 2xl:w-9/12">
                        <h2 class="text-textAzul font-bold text-text40 xl:text-text48 leading-none md:leading-tight">
                            Programe una consulta especializada
                        </h2>
                    </div>

                    <div class="">
                        <form class="flex flex-col gap-5 md:gap-5 font-semibold text-text18 xl:text-text20" id="formContactos">
                            @csrf
                            <div class="flex flex-col md:flex-row gap-5">
                                <div class="w-full">
                                    <input required type="text" placeholder="Nombre" name="name"
                                        class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40" />
                                </div>
                                <div class="w-full">
                                    <input required type="text" placeholder="Apellido" name="last_name"
                                        class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40" />
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-5">
                                <div class="w-full">
                                    <input id="email" required type="email" placeholder="Email" name="email"
                                        class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40" />
                                </div>

                                <div class="w-full">
                                    <input id="telefono" required type="text" placeholder="Teléfono" name="phone"
                                        maxlength="9"
                                        class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40" />
                                </div>
                            </div>

                            <div class="text-[#9CA3AF]">
                                <div class="w-full">
                                    <input required type="text" placeholder="Dirección" name="address"
                                        class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40" />
                                </div>
                            </div>

                            <div>
                                <textarea name="message" id="input" rows="5" maxlength="256" placeholder="Mensaje"
                                    class="border-[1.5px] border-[#D3D3D3] w-full py-3 bg-bgRosaWeak rounded-xl px-2 outline-[#254F9A] text-textAzul placeholder:text-textAzul placeholder:opacity-40"></textarea>
                            </div>

                            <div>
                                <button type="submit" id="btnAjax"
                                    class="bg-bgAzul py-3 px-20 rounded-xl inline-block text-center hover:bg-blue-500 md:duration-500 w-full 2md:w-auto text-textWhite">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>


@section('scripts_improtados')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var especialidades = new Swiper(".especialidades", {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                grab: true,
                centeredSlides: true,
                initialSlide: 2,
                pagination: {
                    el: ".swiper-pagination-estadisticas",
                    clickable: true,
                },
                allowTouchMove: false,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                },
            });

            /* ---------------- CARROSUEL PARA GRILLAS --------- */

            var enfermedades = new Swiper(".enfermedades", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                grab: true,
                centeredSlides: true,
                initialSlide: 2,
                allowTouchMove: true,
            });
            /* --------------------- CARRUSEL PARA MARCAS ------- */

            var logosHospitales = new Swiper(".logosHospitales", {
                slidesPerView: 2,
                spaceBetween: 10,
                loop: true,
                grab: true,
                centeredSlides: false,
                allowTouchMove: false,
                initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        centeredSlides: true,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                },
            });

            /* ----- carrusel de testimonios --------- */

            var testimonios = new Swiper(".testimonios", {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                grab: true,
                allowTouchMove: false,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                centeredSlides: true,
                initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
                autoplay: {
                  delay: 2500,
                  disableOnInteraction: false,
                }, 
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                },
            });

            /* ---------------- FLIPCARD IMC  ----------------------------- */
            const onCalcular = document.querySelector(".btnCalcular");
            const onRegresar = document.querySelector(".btnRegresar");
            const card = document.querySelector(".card");
            const front = document.querySelector(".front");
            const back = document.querySelector(".back");
            const resultado = document.querySelector(".resultado");
            const peso = document.querySelector(".peso");
            const altura = document.querySelector(".altura");

            const imc0 = document.getElementById("imc0");
            const imc1 = document.getElementById("imc1");
            const imc2 = document.getElementById("imc2");
            const imc3 = document.getElementById("imc3");
            const imc4 = document.getElementById("imc4");
            const imc5 = document.getElementById("imc5");
            const imcItems = document.querySelectorAll(".imcItems");
            const imcp = document.querySelectorAll(".imcpInfo");

            let imc = null;

            onCalcular.addEventListener("click", () => {
                imc = (
                    parseFloat(peso.value) / Math.pow(parseFloat(altura.value), 2)
                ).toFixed(1);

                if (imc < 0) {
                    createAlert("Solo se aceptan valores mayores a cero");
                    return;
                }

                if (isNaN(imc)) {
                    createAlert("Debe llenar los campos peso y altura");
                    return;
                }

                resultado.textContent = imc;

                card.classList.toggle("flipCard");
                front.classList.add("hidden");
                back.classList.remove("hidden");

                validateImc(imc);
            });

            onRegresar.addEventListener("click", () => {
                back.classList.add("hidden");
                card.classList.toggle("flipCard");
                front.classList.remove("hidden");
                resultado.textContent = "";
                peso.value = "";
                altura.value = "";

                imc0.classList.remove("bg-green-200");
                imc1.classList.remove("bg-green-200");
                imc2.classList.remove("bg-green-200");
                imc3.classList.remove("bg-red-200");
                imc4.classList.remove("bg-red-200");
                imc5.classList.remove("bg-red-200");

                /* Vuelve a eliminar los estilos y coloca el color inicial */
                imcp.forEach((imc) => {
                    imc.classList.remove(
                        "text-red-600",
                        "bg-green-200",
                        "text-green-600",
                        "bg-red-200"
                    );

                    imc.classList.add("text-textAzul");
                });
            });

            function createAlert(mensaje) {
                const alerta = document.createElement("p");
                onCalcular.disabled = true;
                alerta.textContent = mensaje;
                alerta.classList.add("alerta");
                card.parentNode.insertBefore(alerta, card.nextSibling);
                setTimeout(() => {
                    alerta.remove();
                    onCalcular.disabled = false;
                }, 3000);
            }

            function validateImc(imc) {
                if (imc <= 18.5) {
                    imc0.classList.add("bg-green-200");
                } else if (imc >= 18.5 && imc <= 24.9) {
                    imc1.classList.add("bg-green-200");
                } else if (imc >= 25 && imc <= 29.9) {
                    imc2.classList.add("bg-green-200");
                } else if (imc >= 30 && imc <= 34.9) {
                    imc3.classList.add("bg-red-200");
                } else if (imc >= 35 && imc <= 39.9) {
                    imc4.classList.add("bg-red-200");
                } else {
                    imc5.classList.add("bg-red-200");
                }

                /* Cambia de color al parrafo */
                imcItems.forEach((imc) => {
                    if (imc.classList.contains("bg-green-200")) {
                        imc.children[1].classList.remove("text-textAzul");
                        imc.children[1].classList.add("text-green-600");
                    }
                    if (imc.classList.contains("bg-red-200")) {
                        imc.children[1].classList.remove("text-textAzul");
                        imc.children[1].classList.add("text-red-600");
                    }
                });
            }

            /* ------------------------ deslizante --------------- */

            const one = document.querySelector(".one");
            const two = document.querySelector(".two");
            const three = document.querySelector(".three");
            const four = document.querySelector(".four");
            const five = document.querySelector(".five");
            const firstIcon = document.querySelector("#firstIcon");
            const firstCircle = document.querySelector("#firstCircle");
            const secondIcon = document.querySelector("#secondIcon");
            const secondCircle = document.querySelector("#secondCircle");
            const thirdsIcon = document.querySelector("#thirdsIcon");
            const thirdsCircle = document.querySelector("#thirdsCircle");

            let stepOne = null;
            let stepTwo = null;
            let stepThree = null;

            one.onclick = function() {
                stepOne = 1;
                one.classList.add("active");
                two.classList.remove("active");
                three.classList.remove("active");

                if (stepOne < stepTwo || stepOne < stepThree) {
                    secondIcon.setAttribute("stroke", "#66AAD8");
                    secondCircle.setAttribute("fill", "#F8FBFD");
                    thirdsIcon.setAttribute("stroke", "#66AAD8");
                    thirdsCircle.setAttribute("fill", "#F8FBFD");
                }
                if (stepOne < stepTwo && stepOne < stepThree) {
                    stepTwo = null;
                    stepThree = null;
                }
            };

            two.onclick = function() {
                stepTwo = 2;
                one.classList.add("active");
                two.classList.add("active");
                three.classList.remove("active");
                secondIcon.setAttribute("stroke", "#ffffff");
                secondCircle.setAttribute("fill", "#42BAE2");

                if (stepTwo < stepThree || stepTwo > stepOne) {
                    thirdsIcon.setAttribute("stroke", "#66AAD8");
                    thirdsCircle.setAttribute("fill", "#F8FBFD");

                    firstIcon.setAttribute("stroke", "#ffffff");
                    firstCircle.setAttribute("fill", "#42BAE2");
                }
            };
            three.onclick = function() {
                stepThree = 3;
                one.classList.add("active");
                two.classList.add("active");
                three.classList.add("active");

                thirdsIcon.setAttribute("stroke", "#ffffff");
                thirdsCircle.setAttribute("fill", "#42BAE2");

                if (stepThree > stepTwo || stepThree > stepOne) {
                    firstIcon.setAttribute("stroke", "#ffffff");
                    firstCircle.setAttribute("fill", "#42BAE2");
                    secondIcon.setAttribute("stroke", "#ffffff");
                    secondCircle.setAttribute("fill", "#42BAE2");
                }
            };
        });
    </script>
@stop

@stop
