<header
    class="{{ Route::currentRouteName() === 'index' ? 'bg-transparent' : 'bg-bgAzul' }}  font-outfit absolute w-full ">
    <div class="text-textWhite flex justify-between items-center w-11/12 md:max-w-6xl mx-auto py-5">
        <div class="flex justify-start items-center w-full md:w-auto" data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/img/logo.png') }}" alt="doctor Kewin">
            </a>

        </div>

        <div class="hidden lg:flex justify-center items-center gap-10 font-semibold text-text18 xl:text-text22">
            <nav class="flex justify-center items-center gap-10 text-center" data-aos="fade-up" data-aos-offset="150">
                <a href="{{ route('index') }}"
                    class="{{ Route::currentRouteName() === 'index' ? 'text-textCeleste font-bold' : '' }} ">Inicio</a>
                <a href="{{ route('servicios') }}"
                    class="{{ Route::currentRouteName() === 'servicios' ? 'text-textCeleste font-bold' : '' }} ">Servicios</a>
                <a href="{{ route('nosotros') }}"
                    class="{{ Route::currentRouteName() === 'nosotros' ? 'text-textCeleste font-bold' : '' }} ">Acerca
                    del Doctor</a>
                <a href="{{ route('blogs') }}"
                    class="{{ Route::currentRouteName() === 'blogs' ? 'text-textCeleste font-bold' : '' }} ">Blogs</a>


            </nav>


            <x-boton-solicitar-cita :generales="$generales" data-aos="fade-up" data-aos-offset="150"></x-boton-solicitar-cita>

        </div>

        <!--movile navbar-->
        <!-- Botón de menú para dispositivos móviles -->
        <div class="lg:hidden flex items-center">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <i id="menu-icon" class="fa-solid fa-bars fa-xl"></i>
            </button>
        </div>


    </div>

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
        <nav class="mb-8 flex flex-col justify-center items-center gap-10 text-center w-11/12 md:max-w-6xl mx-auto"
            data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('index') }}"
                class="{{ Route::currentRouteName() === 'index' ? 'text-textCeleste font-bold' : '' }} ">Inicio</a>
            <a href="{{ route('servicios') }}"
                class="{{ Route::currentRouteName() === 'servicios' ? 'text-textCeleste font-bold' : '' }} ">Servicios</a>
            <a href="{{ route('nosotros') }}"
                class="{{ Route::currentRouteName() === 'nosotros' ? 'text-textCeleste font-bold' : '' }} ">Acerca
                del Doctor</a>
            <a href="{{ route('blogs') }}"
                class="{{ Route::currentRouteName() === 'blogs' ? 'text-textCeleste font-bold' : '' }} ">Blogs</a>
        </nav>

        <div class="w-11/12 md:max-w-6xl mx-auto">
            <x-boton-solicitar-cita :generales="$generales" data-aos="fade-up" data-aos-offset="150"></x-boton-solicitar-cita>
        </div>
    </div>
</header>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const menuIcon = document.getElementById('menu-icon');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        if (menu.classList.contains('hidden')) {
            menuIcon.className = 'fa-solid fa-bars fa-xl';
        } else {
            menuIcon.className = 'fa-solid fa-xmark fa-xl';
        }
    });
</script>
