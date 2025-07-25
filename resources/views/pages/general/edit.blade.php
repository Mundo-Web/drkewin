<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('datosgenerales.update', $general->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Datos generales
                        del negocio</h2>
                </header>
                @if (session('success'))
                    <script>
                        window.onload = function() {
                            mostrarAlerta();
                        }
                    </script>
                @endif
                <div class="p-3">

                    <div>


                        <div class="flex items-center justify-center">
                            <div>
                                <div>

                                    <div class=" rounded shadow-lg p-4 px-4 ">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1">

                                            <div class="lg:col-span-1">
                                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                                                    <h2
                                                        class="md:col-span-5 text-lg font-semibold text-slate-800 dark:text-white">
                                                        Información de contacto</h2>

                                                    <div class="md:col-span-5">
                                                        <label for="title1">Título uno</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="title1" name="title1"
                                                                value="{{ $general->title1 }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="title2">Link de Youtube</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="title2" name="title2"
                                                                value="{{ $general->title2 }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="description">Descripción</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="description" name="description"
                                                                value="{{ $general->description }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="address">Dirección de la empresa</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="address" name="address"
                                                                value="{{ $general->address }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label for="inside">Interior</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="inside" name="inside"
                                                                value="{{ $general->inside }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Interior Oficina 204 - Piso 4">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label for="district">Distrito</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="district" name="district"
                                                                value="{{ $general->district }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Interior Oficina 204 - Piso 4">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-1">
                                                        <label for="country">País</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="country" name="country"
                                                                value="{{ $general->country }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Interior Oficina 204 - Piso 4">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label for="email">Correo electrónico</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="email" id="email" name="email"
                                                                value="{{ $general->email }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-1">
                                                        <label for="cellphone">Número de celular</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="cellphone" name="cellphone"
                                                                value="{{ $general->cellphone }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="+51 123456789">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-1">
                                                        <label for="office_phone">Número de Teléfono</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="office_phone"
                                                                name="office_phone"
                                                                value="{{ $general->office_phone }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="+51 1234567">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-1">
                                                        <label for="whatsapp">Número Para Whatsapp</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="whatsapp" name="whatsapp"
                                                                value="{{ $general->whatsapp }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="+51 1234567">
                                                        </div>
                                                    </div>
                                                    <div class="md:col-span-5">
                                                        <label for="mensaje_whatsapp">Mensaje predeterminado para
                                                            qhastApp</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="mensaje_whatsapp"
                                                                name="mensaje_whatsapp"
                                                                value="{{ $general->mensaje_whatsapp }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="+51 1234567">
                                                        </div>
                                                    </div>


                                                    <div class="md:col-span-5">
                                                        <label for="schedule">Horario de Oficina</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="schedule" name="schedule"
                                                                value="{{ $general->schedule }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Horario de Oficina">
                                                        </div>
                                                    </div>


                                                    <h2
                                                        class="md:col-span-5 text-lg font-semibold text-slate-800 mt-2 dark:text-white">
                                                        Redes Sociales</h2>

                                                    <div class="md:col-span-5">
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-0">
                                                            <div>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_facebook"
                                                                        name="facebook"
                                                                        value="{{ $general->facebook }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Facebook">
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <div class="relative ">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_instagram"
                                                                        name="instagram"
                                                                        value="{{ $general->instagram }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Instagram">
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <div class="relative ">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_youtube"
                                                                        name="youtube"
                                                                        value="{{ $general->youtube }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Youtube">
                                                                </div>
                                                            </div>

                                                            <div>

                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_linkedin"
                                                                        name="linkedin"
                                                                        value="{{ $general->linkedin }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="linkedin">
                                                                </div>
                                                            </div>

                                                            <div>

                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_tiktok"
                                                                        name="tiktok" value="{{ $general->tiktok }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="tiktok">
                                                                </div>
                                                            </div>

                                                            <div>

                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </div>
                                                                    <input type="text" id="rs_twitter"
                                                                        name="twitter"
                                                                        value="{{ $general->twitter }}"
                                                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        placeholder="Twitter">
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>

                                                    <!-- Sección SEO -->
                                                    <h2
                                                        class="md:col-span-5 text-lg font-semibold text-slate-800 mt-4 dark:text-white">
                                                        Configuración SEO</h2>

                                                    <div class="md:col-span-5">
                                                        <label for="meta_title">Meta Título (SEO)</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-tag"></i>
                                                            </div>
                                                            <input type="text" id="meta_title" name="meta_title"
                                                                value="{{ $general->meta_title }}" maxlength="60"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Título optimizado para motores de búsqueda (máx. 60 caracteres)">
                                                        </div>
                                                        <small class="text-gray-500">Máximo 60 caracteres. Este será el título que aparece en los resultados de búsqueda.</small>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="meta_description">Meta Descripción (SEO)</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute top-3 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-align-left"></i>
                                                            </div>
                                                            <textarea id="meta_description" name="meta_description" rows="3" maxlength="160"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Descripción que aparecerá en los resultados de búsqueda (máx. 160 caracteres)">{{ $general->meta_description }}</textarea>
                                                        </div>
                                                        <small class="text-gray-500">Máximo 160 caracteres. Esta descripción aparece en los resultados de búsqueda.</small>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="meta_keywords">Palabras Clave (Keywords)</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-key"></i>
                                                            </div>
                                                            <input type="text" id="meta_keywords" name="meta_keywords"
                                                                value="{{ $general->meta_keywords }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="palabras, clave, separadas, por, comas">
                                                        </div>
                                                        <small class="text-gray-500">Palabras clave relevantes separadas por comas.</small>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="canonical_url">URL Canónica</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-link"></i>
                                                            </div>
                                                            <input type="url" id="canonical_url" name="canonical_url"
                                                                value="{{ $general->canonical_url }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="https://ejemplo.com">
                                                        </div>
                                                        <small class="text-gray-500">URL principal de su sitio web para evitar contenido duplicado.</small>
                                                    </div>

                                                    <!-- Open Graph (Redes Sociales) -->
                                                    <h2
                                                        class="md:col-span-5 text-lg font-semibold text-slate-800 mt-4 dark:text-white">
                                                        Open Graph (Redes Sociales)</h2>

                                                    <div class="md:col-span-3">
                                                        <label for="og_title">Título para Redes Sociales</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-share-alt"></i>
                                                            </div>
                                                            <input type="text" id="og_title" name="og_title"
                                                                value="{{ $general->og_title }}" maxlength="60"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Título al compartir en redes sociales">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-2">
                                                        <label for="og_image">Imagen para Redes Sociales</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-image"></i>
                                                            </div>
                                                            <input type="url" id="og_image" name="og_image"
                                                                value="{{ $general->og_image }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="/images/og-image.jpg">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="og_description">Descripción para Redes Sociales</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute top-3 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-solid fa-comment"></i>
                                                            </div>
                                                            <textarea id="og_description" name="og_description" rows="2" maxlength="200"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Descripción que aparecerá al compartir en redes sociales">{{ $general->og_description }}</textarea>
                                                        </div>
                                                        <small class="text-gray-500">Descripción optimizada para cuando el contenido se comparte en redes sociales.</small>
                                                    </div>
                                                    <!-- <div class="md:col-span-2">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                        </div> -->

                                                    <!-- <div class="md:col-span-2">
                                            <label for="country">Country / region</label>
                                            <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                            <input name="country" id="country" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                            <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                            <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                            </button>
                                            </div>
                                        </div> -->

                                                    <!-- <div class="md:col-span-2">
                                            <label for="state">State / province</label>
                                            <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                            <input name="state" id="state" placeholder="State" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                                            <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                            <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                            </button>
                                            </div>
                                        </div> -->



                                                    <!-- <div class="md:col-span-5">
                                            <div class="inline-flex items-center">
                                            <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                                            <label for="billing_same" class="ml-2">My billing address is different than above.</label>
                                            </div>
                                        </div> -->

                                                    <div class="md:col-span-5 text-right mt-6">
                                                        <div class="inline-flex items-end">
                                                            <button type="submit" id="form_general"
                                                                onclick="confirmarActualizacion()"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Actualizar
                                                                datos</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $('document').ready(function() {

            // Función para mostrar la alerta de confirmación antes de enviar el formulario
            function confirmarActualizacion() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción actualizará los datos.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía el formulario si se confirma la acción
                        document.getElementById('form_general').submit();
                    }
                });
            }


            function mostrarAlerta() {
                Swal.fire({
                    title: '¡Actualizado!',
                    text: 'Los datos se han actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                });
            }


        });
    </script>


</x-app-layout>
