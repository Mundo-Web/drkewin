@extends('components.public.matrix')

@section('css_improtados')
    <style>
        #description>p {
            margin-bottom: 1rem !important;
            line-height: 1.5rem;
        }
    </style>
@stop
{{-- style="background-image: url({{asset('images/img/Hero_Doctor_mobile.png')}})" --}}
@section('content')
    <main class="flex flex-col gap-10 mb-10 bg-white font-outfit">

        <div class="bg-white mt-32" data-aos="fade-up" data-aos-offset="150">
            <!-- Sección Principal -->
            <section class="pt-6 pb-6 bg-white mt-4 md:mt-10 w-11/12  md:max-w-6xl mx-auto">
                <!-- Imagen del Doctor -->
                <img src="{{ asset($post->url_image) }}" alt="{{ $post->title }}"
                    class="w-full  lg:w-1/2 min-h-[500px] object-cover rounded-xl float-left lg:mr-6 mb-4" loading="lazy" />
                <!-- Contenido Principal -->
                <div>
                    <h1 class="text-text52 font-bold text-textAzul mb-4">
                        {{ $post->title }}
                    </h1>
                    <div id="description" class="text-textAzul  leading-6 text-text18">
                        {!! $post->description !!}
                    </div>


                </div>
                <div class="flex items-center justify-end gap-4" data-aos="fade-up" data-aos-offset="150">
                    <p class="text-text18 text-textAzul font-bold">Compartir post</p>
                    <!-- Twitter -->
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($title) }}"
                        target="_blank"
                        class="bg-bgCeleste hover:bg-bgCelesteStrong text-white h-14 w-14  rounded-full flex justify-center items-center">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"
                        class="bg-bgCeleste hover:bg-bgCelesteStrong text-white h-14 w-14  rounded-full flex justify-center items-center">
                        <i class="fa-brands fa-facebook-f fa-xl"></i>

                    </a>



                    <!-- Linkedin -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($url) }}&title={{ urlencode($title) }}"
                        target="_blank"
                        class="bg-bgCeleste hover:bg-bgCelesteStrong text-white h-14 w-14  rounded-full flex justify-center items-center">
                        <i class="fa-brands fa-linkedin-in fa-xl"></i>
                    </a>
                </div>
            </section>




            <!-- Últimos Posts -->

            <section class="py-6 md:py-12 bg-bgRosa pt-6 pb-6 mt-4 md:mt-10 w-11/12  md:max-w-6xl mx-auto"
                data-aos="fade-up" data-aos-offset="150">
                <h2 class="text-text48 text-textAzul font-bold mb-8 ">Otras publicaciones</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Tarjetas de publicaciones -->
                    @foreach ($otherPosts as $post)
                        <div class="bg-bgWhiteWeak rounded-xl shadow-md overflow-hidden">
                            <img src="{{ asset($post->url_image) }}" alt="{{ $post->title }}" class="w-full object-cover"
                                loading="lazy" />
                            <div class="p-4">
                                <h3 class="font-bold text-textAzul text-text24 mb-2">{{ $post->title }}</h3>
                                <div class="line-clamp-2   text-textAzul text-text16 mb-4 ">
                                    {!! $post->description !!}
                                </div>
                                <a href="{{ route('detalle-post', $post->slug) }}"
                                    class="block text-center bg-bgCeleste text-white font-bold px-6 py-3 rounded-md hover:bg-bgCelesteStrong transition w-full">
                                    Leer más
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Repite este bloque para más publicaciones -->
                </div>

            </section>
        </div>

    </main>



@section('scripts_improtados')
@stop

@stop
