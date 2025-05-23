<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path
                        d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                        fill="#4F46E5" />
                    <path
                        d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                        fill="url(#logo-a)" />
                    <path
                        d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                        fill="url(#logo-b)" />
                </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Dr. Kewin - BackEnd</span>
                </h3>
                <ul class="mt-3">

                    <!-- Messages -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('mensajes.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <i class="fa-solid fa-message"></i>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mensajes</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    @if ($mensajes !== 0)
                                        <span
                                            class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">
                                            {{ $mensajes }}
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </li>

                    <!-- suscriptores -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['subscriptores'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['subscriptores'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('subscriptores.index') }}">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <i class="fa-regular fa-newspaper"></i>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Subscriptores</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                    @if ($subscriptores !== 0)
                                        <span
                                            class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">
                                            {{ $subscriptores }}
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </li>
                    <!---->

                    <!-- Datos generales -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['datosgenerales'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('datosgenerales.edit', 1) }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-address-book"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos
                                    Generales</span>
                            </div>
                        </a>
                    </li>



                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['slides'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['slides'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('slides.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-hard-drive"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos
                                    Slides</span>
                            </div>
                        </a>
                    </li>


                    <!-- Datos About -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['about'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['about'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('about.edit', 1) }}">
                            <div class="flex items-center">
                                <i class="fa-regular fa-id-card"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos
                                    Acerca De</span>
                            </div>
                        </a>
                    </li>

                    <!-- Rotaciones Medicas -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['rotaciones'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['rotaciones'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('rotaciones.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-medal"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Datos
                                    Rotaciones Medicas</span>
                            </div>
                        </a>
                    </li>

                    <!-- Servicios -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['servicios'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['servicios'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('servicios.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-doctor"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Servicios</span>
                            </div>
                        </a>
                    </li>


                    <!-- Testimony -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['testimonios'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['testimonios'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('testimonios.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-child-reaching"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Testimonios</span>
                            </div>
                        </a>
                    </li>


                    <!-- Category -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['categorias'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['categorias'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('categorias.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-book-medical"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Categorias</span>
                            </div>
                        </a>
                    </li>



                    <!-- Clientes -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['logos'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['logos'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('logos.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-building"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Logos
                                    Cliente</span>
                            </div>
                        </a>
                    </li>
                    <!-- Eventos -->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['eventos'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['eventos'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('eventos.index') }}">
                            <div class="flex items-center">
                                <i class="fa-regular fa-calendar-days"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    Eventos</span>
                            </div>
                        </a>
                    </li>
                    <!--Blog-->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['blog'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['blog'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('blog.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-blog"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Blogs</span>
                            </div>
                        </a>
                    </li>
                    <!--Album de Imagenes-->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['albums'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['albums'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('albums.index') }}">
                            <div class="flex items-center">
                                <i class="fa-solid fa-images"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Album
                                    de Imagenes</span>
                            </div>
                        </a>
                    </li>
                    <!--Album de Videos-->
                    <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['videos'])) {{ 'bg-slate-900' }} @endif">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['videos'])) {{ 'hover:text-slate-200' }} @endif"
                            href="{{ route('videos.index') }}">
                            <div class="flex items-center">
                                <i class="fa-brands fa-youtube"></i>
                                <span
                                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Videos</span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
