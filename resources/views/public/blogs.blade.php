@extends('components.public.matrix')
<link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@section('css_improtados')
    <style>
        .bg__servicios-fondo {
            background-color: #23498E;
        }
    </style>
    <style>
        .pagination {
            justify-content: center;
            margin: 20px 0;

        }

        .pagination li a {
            color: #254F9A;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            margin-left: 0.75rem;
            margin-right: 0.75rem;
            border-radius: 100%;

        }

        .pagination ul {
            box-shadow: none;
        }

        .pagination nav div>span {
            background-color: #254F9A;
            color: #fff;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            border-radius: 100%;
            width: 40px;
            height: 40px;
        }

        .pagination nav div>a {
            background-color: #254F9A;
            color: #fff;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            border-radius: 100%;
            width: 40px;
            height: 40px;
        }


        .pagination li a {

            color: #254F9A;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            duration: 300ms;
        }

        .pagination li a:hover {
            background-color: #254F9A;
            color: #fff;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            duration: 300ms;
        }


        li[aria-current="page"] span {
            background-color: #254F9A;
            color: #fff;
            /* Color del botón */
            font-size: 14px;
            text-decoration: none;
            border: none;
            border-radius: 100%;
            width: 40px;
            height: 40px;

        }

        .pagination li.disabled a {
            color: #3F64A6;
            border: none;
        }

        .pagination div>div {
            display: none;
        }

        .pagination div>nav {
            margin: auto
        }

        .active {
            background-color: #254F9A;
        }

        .active>p {
            color: #FFF;
        }
    </style>
@stop
{{-- style="background-image: url({{asset('images/img/Hero_Doctor_mobile.png')}})" --}}
@section('content')
    <main class="flex flex-col gap-10  bg-white font-outfit">
        <div class="h-[122px] w-full bg-bgAzulStrong"></div>

        <!-- Blog Principal -->
        <section class="pt-6 md:pt-12 bg-white mt-4 md:mt-10 w-11/12 mx-auto">
            <h2 class="text-textAzul font-bold text-start text-text20">Descubre lo nuevo en Medicina</h2>
            <h1 class="text-text56 font-bold text-textAzul text-start mb-8">Nuestro Blog de artículos</h1>
            <div class="flex flex-col md:flex-row items-start gap-8">
                <!-- Artículo principal -->
                <div class="md:w-3/5 bg-bgRosa overflow-hidden rounded-xl">
                    <img src="{{ asset($latestPost->url_image) }}" alt="{{ $latestPost->name_image }}" loading="lazy" />
                    <div class="p-6 ">
                        <h3 class="text-text24 font-bold text-textAzul mb-2">{{ $latestPost->title }}</h3>
                        <div class="line-clamp-2   text-textAzul text-text16 mb-4 ">
                            {{ $latestPost->extracto }}
                        </div>
                        <a href="{{ route('detalle-post', $latestPost->slug) }}"
                            class=" text-center bg-bgCeleste text-white font-bold block w-full px-6 py-3 rounded-xl hover:bg-bgCelesteStrong transition">
                            Leer más
                        </a>
                    </div>
                </div>

                <!-- Últimos Posts -->
                <div class="md:w-2/5">
                    <h3 class="text-text24 font-bold text-textAzul mb-4">Últimos posts</h3>
                    <ul class="space-y-4">
                        @foreach ($otherPosts as $otherPost)
                            <li class="bg-bgRosa rounded-xl overflow-hidden flex items-center justify-between">
                                <div class="w-7/12 p-4 ">
                                    <p class="text-textAzul font-bold mb-4">{{ $otherPost->title }}</p>
                                    <a href="{{ route('detalle-post', $otherPost->slug) }}"
                                        class="text-white bg-bgCeleste py-1 px-3 rounded-xl text-text16">Leer más</a>
                                </div>

                                <img src="{{ asset($otherPost->url_image) }}" alt="{{ $otherPost->name_image }}"
                                    class=" w-5/12 h-[150px] object-cover" loading="lazy" />

                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </section>

        <!-- Últimas publicaciones -->
        <section class="p-6 md:p-12 bg-white">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div class="w-full md:w-3/6">
                    <h2 class="text-textCeleste text-text20 font-semibold text-start">Descubre lo nuevo en tecnología</h2>
                    <h1 class="text-text48 font-bold text-textAzul text-start mb-4 ">Últimas publicaciones</h1>
                </div>
                <div class="w-full md:w-3/6">

                    <div class="swiper multiple-slide-carousel swiper-container relative ">
                        <div class="swiper-wrapper ">
                            <div class="swiper-slide">
                                <div class="cursor-pointer  bg-bgRosa rounded-xl w-full p-2 flex h-[60px]  items-center justify-center text-center btn-categoria active "
                                    data-id="todos">
                                    <p class="  text-text16 font-bold text-textAzul">Todos</p>
                                </div>
                            </div>
                            @foreach ($allCategorias as $categoria)
                                <div class="swiper-slide">
                                    <div class=" cursor-pointer bg-bgRosa rounded-xl w-full p-2 flex h-[60px]  items-center justify-center text-center btn-categoria "
                                        data-id="{{ $categoria->id }}">
                                        <p class=" cursor-pointer text-text16 font-bold text-textAzul">
                                            {{ $categoria->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div id="posts" class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @include('public.filtro_posts', ['posts' => $allPosts])
                <!-- Tarjetas de publicaciones -->

            </div>

        </section>

        <!-- Suscripción -->
        <section class="bg-bgCeleste py-14 text-white text-center">
            <div class=" w-11/12 mx-auto flex flex-col md:flex-row gap-4 items-center ">
                <div class="md:w-1/2 text-start">
                    <h2 class="text-text20 font-semibold ">¡Tu camino hacia una vida más saludable comienza ahora!</h2>
                    <h1 class="text-text40 md:text-text60 font-bold ">¡Déjanos tu correo y recibe la mejor info!</h1>
                </div>
                <div class="w-full md:w-1/2 bg-bgRosaWeak rounded-xl items-center h-full p-8 ">
                    <form id="newsletterForm" class="flex flex-col ">
                        @csrf
                        <div class="flex flex-col gap-4 w-full">
                            <label for="email" class="text-textAzul text-start font-medium text-text14 xl:text-text18">
                                Correo Electrónico
                            </label>
                            <input id="emailSubscriptor" type="email" name="email" placeholder="hola@mail.com" required
                                class="bg-white w-full py-4 rounded-lg px-2 border-none text-textAzul" />
                        </div>
                        <button type="submit"
                            class="bg-bgAzul text-white px-6 py-3 rounded-xl mt-4 hover:bg-bgAzulStrong transition w-full font-bold">
                            Registrarte
                        </button>
                    </form>
                </div>
            </div>
        </section>





    </main>

@section('scripts_improtados')
    <script>
        var swiper = new Swiper(".multiple-slide-carousel", {
            loop: false,

            breakpoints: {
                1920: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
                1028: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                300: {
                    slidesPerView: 2,
                    spaceBetween: 0
                }
            }
        });
    </script>

    <script>
        $(document).on('click', '.btn-categoria', function() {

            const categoriaId = $(this).data('id');
            // Remover la clase 'active' de todos los botones
            $('.btn-categoria').removeClass('active');

            // Agregar clases al botón clickeado
            $(this).addClass('active');


            // Llamada AJAX
            $.ajax({
                url: '{{ route('blogs') }}', // Ruta de tu filtro
                method: 'GET',
                data: {
                    categoria_id: categoriaId
                },
                success: function(data) {
                    // Reemplaza el contenido del contenedor
                    $('#posts').html(data);
                },
                error: function() {
                    alert('Error al cargar los posts.');
                }
            });
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            fetchProductos({}, url);
        });

        function fetchProductos(params = {}, url = '{{ route('blogs') }}') {
            $.ajax({
                url: url,
                data: params,
                success: function(data) {
                    $('#posts').html(data);
                },
                error: function() {
                    alert('Error al cargar los productos.');
                }
            });
        }
    </script>
@stop

@stop
