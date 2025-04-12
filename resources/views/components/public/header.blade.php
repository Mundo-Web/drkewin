@php
    $servicios = App\Models\Service::where('status', true)->where('visible', true)->get();
@endphp

<header
    class="{{ Route::currentRouteName() === 'index' ? 'bg-transparent' : 'bg-bgAzul' }} font-outfit absolute w-full z-50 ">
    <div class="text-textWhite flex justify-between items-center w-11/12 md:max-w-6xl mx-auto py-5">
        <div class="flex justify-start items-center w-full md:w-auto" data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/img/logo.png') }}" alt="doctor Kewin">
            </a>
        </div>

        <div class="hidden lg:flex justify-center items-center gap-10 font-semibold text-text18 xl:text-text22">
            <nav class="flex justify-center items-center gap-10 text-center" data-aos="fade-up" data-aos-offset="150">
                <a href="{{ route('index') }}"
                    class="{{ Route::currentRouteName() === 'index' ? 'text-textCeleste font-bold' : '' }} [text-shadow:_0_2px_4px_rgba(0,0,0,0.5)]">Inicio</a>

                <!-- Enlace de Servicios con modal -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = true"
                        class="{{ Route::currentRouteName() === 'servicios' ? 'text-textCeleste font-bold' : '' }} flex items-center gap-1  transition-colors [text-shadow:_0_2px_4px_rgba(0,0,0,0.5)]">
                        Servicios <i class="fa-solid fa-chevron-down text-xs ml-2"></i>
                    </button>

                    <!-- Modal de Servicios -->
                    <!-- Modal de Servicios ajustado -->
                    <div x-show="open" @click.away="open = false" x-transition.origin.top.right
                        class="fixed top-10 left-4 bg-white rounded-xl shadow-xl z-50 max-h-[70vh] overflow-y-auto w-[20rem]"
                        x-cloak style="max-height: calc(100vh - 100px);">
                        <div class="p-4 space-y-2">
                            @foreach ($servicios as $servicio)
                                <a href="{{ route('servicios', ['slug' => $servicio->slug]) }}"
                                    class="flex w-full px-3 py-2 text-base hover:bg-bgRosaWeak rounded transition-colors text-textAzul  justify-between">
                                    <span>{{ $servicio->title }}</span>
                                    <i class="fa-solid fa-chevron-down text-xs -rotate-90"></i>
                                </a>
                            @endforeach
                            <div class="pt-2 border-t mt-2">
                                <a href="{{ route('servicios') }}"
                                    class="block bg-bgCeleste font-semibold px-3 py-2 hover:bg-bgAzul rounded-xl text-white">
                                    Ver todos <i class="fa-solid fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <a href="{{ route('nosotros') }}"
                    class="{{ Route::currentRouteName() === 'nosotros' ? 'text-textCeleste font-bold' : '' }} [text-shadow:_0_2px_4px_rgba(0,0,0,0.5)]">Conoceme</a>
                <a href="{{ route('blogs') }}"
                    class="{{ Route::currentRouteName() === 'blogs' ? 'text-textCeleste font-bold' : '' }} [text-shadow:_0_2px_4px_rgba(0,0,0,0.5)]">Blogs</a>
            </nav>

            <x-boton-solicitar-cita :generales="$generales" data-aos="fade-up" data-aos-offset="150"></x-boton-solicitar-cita>
        </div>

        <!-- Botón de menú móvil -->
        <div class="lg:hidden flex items-center">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <i id="menu-icon" class="fa-solid fa-bars fa-xl"></i>
            </button>
        </div>
    </div>

    <!-- Botón de WhatsApp -->
    <div class="flex justify-end w-11/12 md:max-w-6xl mx-auto mb-4 z-10">
        <div class="fixed bottom-6 sm:bottom-[2rem] lg:bottom-[4rem] z-20">
            <a target="_blank"
                href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
                rel="noopener">
                <img src="{{ asset('images/svg/WhatsApp.svg') }}" alt="whatsapp" class="w-20 h-20 md:w-full md:h-full">
            </a>
        </div>
    </div>

    <!-- Menú desplegable para móviles -->
    <div id="menu" class="hidden lg:hidden bg-bgAzul text-textWhite shadow-lg w-full h-screen absolute z-10">
        <nav
            class="mb-8 flex flex-col justify-center items-center gap-10 text-center w-11/12 md:max-w-6xl mx-auto pt-10">
            <a href="{{ route('index') }}"
                class="{{ Route::currentRouteName() === 'index' ? 'text-textCeleste font-bold' : '' }}">Inicio</a>

            <!-- Modal de Servicios en móvil -->
            <button id="servicios-modal-toggle"
                class="{{ Route::currentRouteName() === 'servicios' ? 'text-textCeleste font-bold' : '' }}">
                Servicios
            </button>

            <a href="{{ route('nosotros') }}"
                class="{{ Route::currentRouteName() === 'nosotros' ? 'text-textCeleste font-bold' : '' }}">Conoceme</a>
            <a href="{{ route('blogs') }}"
                class="{{ Route::currentRouteName() === 'blogs' ? 'text-textCeleste font-bold' : '' }}">Blogs</a>
        </nav>

        <div class="w-11/12 md:max-w-6xl mx-auto">
            <x-boton-solicitar-cita :generales="$generales" data-aos="fade-up" data-aos-offset="150"></x-boton-solicitar-cita>
        </div>
    </div>
</header>

<!-- Modal de Servicios para móvil -->
<div id="servicios-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg max-w-2xl w-full max-h-[80vh] overflow-y-auto">
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-textAzul font-bold text-text24">Nuestros Servicios</h3>
            <button id="servicios-modal-close" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>

        <div class="p-4 grid grid-cols-1 gap-4">
            @foreach ($servicios as $servicio)
                <a href="{{ route('servicios', ['slug' => $servicio->slug]) }}"
                    class="p-4 rounded-lg hover:bg-bgRosaWeak transition-colors border border-gray-200">
                    <h4 class="font-bold text-textAzul text-text18">{{ $servicio->title }}</h4>
                    <p class="text-gray-600 mt-2 text-text14">{{ $servicio->extracto }}</p>
                </a>
            @endforeach
        </div>

        <div class="border-t p-4 text-center">
            <a href="{{ route('servicios') }}"
                class="bg-bgCeleste text-white px-6 py-2 rounded-lg inline-block hover:bg-bgCelesteStrong transition-colors">
                Ver todos los servicios
            </a>
        </div>
    </div>
</div>

<script>
    // Menú móvil
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const menuIcon = document.getElementById('menu-icon');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('fa-bars');
        menuIcon.classList.toggle('fa-xmark');
    });

    // Modal de servicios en móvil
    const serviciosModalToggle = document.getElementById('servicios-modal-toggle');
    const serviciosModal = document.getElementById('servicios-modal');
    const serviciosModalClose = document.getElementById('servicios-modal-close');

    if (serviciosModalToggle && serviciosModal) {
        serviciosModalToggle.addEventListener('click', function() {
            serviciosModal.classList.remove('hidden');
            serviciosModal.classList.add('flex');
        });

        serviciosModalClose.addEventListener('click', function() {
            serviciosModal.classList.add('hidden');
            serviciosModal.classList.remove('flex');
        });
    }
</script>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
