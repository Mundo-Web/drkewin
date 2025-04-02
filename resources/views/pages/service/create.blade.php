<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form id="form-servicio" action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Creación de
                        nuevo servicio</h2>
                </header>

                <div class="p-3">
                    <div class="rounded shadow-lg p-4 px-4 ">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="title">Titulo de servicio</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <input type="text" id="title" name="title" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Titulo">
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="extracto">Extracto</label>
                                <div class="relative mb-2 mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <textarea type="text" rows="2" id="extracto" name="extracto" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Extracto"></textarea>
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="description">Descripcion de servicio</label>
                                <div class="relative mb-2 mt-2">

                                    <textarea type="text" rows="2" id="description" name="description" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                        placeholder="Descripción"></textarea>
                                </div>
                            </div>
                            <div class="md:col-span-5">
                                <label for="process">Descripción del proceso</label>
                                <div class="relative mb-2 mt-2">
                                    <textarea type="text" rows="2" id="process" name="process"
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Descripción del proceso"></textarea>
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="address">Subir una Foto <span class="text-red-500">( formato jpg,png |
                                        resolucion 1920 x 1280 )</span></label>
                                <div class="relative mb-2  mt-2">
                                    <input name="imagen"
                                        class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                        accept="image/png,image/svg+xml">
                                </div>
                            </div>

                            <!-- agregar descripcione -->
                            <!-- <div class=""> -->
                            <!-- 1 -->
                            <!-- <div class="md:col-span-6">

                                </div> -->
                            <div class="md:col-span-5">
                                <label for="name_beneficio1">Titulo del primer beneficio</label>
                                <div class="relative mb-2  mt-2">

                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>

                                    <input type="text" id="name_beneficio1" name="name_beneficio1" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Titulo">
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="primer_benefico">Primer beneficio</label>
                                <div class="relative mb-2 mt-2">

                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>

                                    <textarea type="text" rows="2" id="description_beneficio1" name="description_beneficio1" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Primer beneficio"></textarea>
                                </div>
                            </div>
                            <!-- 2 -->

                            <div class="md:col-span-5">
                                <label for="name_beneficio2">Titulo del segundo beneficio</label>
                                <div class="relative mb-2  mt-2">

                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>

                                    <input type="text" id="name_beneficio2" name="name_beneficio2" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Titulo">
                                </div>
                            </div>
                            <div class="md:col-span-5">
                                <label for="name_beneficio2">Segundo beneficio</label>
                                <div class="relative mb-2 mt-2">

                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>

                                    <textarea type="text" rows="2" id="description_beneficio2" name="description_beneficio2" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Segundo beneficio"></textarea>
                                </div>
                            </div>
                            <!-- 3 -->

                            <div class="md:col-span-5">
                                <label for="name_beneficio3">Titulo del tercer beneficio</label>
                                <div class="relative mb-2  mt-2">

                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>

                                    <input type="text" id="name_beneficio3" name="name_beneficio3" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Titulo">
                                </div>
                            </div>
                            <div class="md:col-span-5">
                                <label for="name_beneficio3">Tercer beneficio</label>
                                <div class="relative mb-2 mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <textarea type="text" rows="2" id="description_beneficio3" name="description_beneficio3" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tercer beneficio"></textarea>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="md:col-span-5">
                                <label for="name_beneficio4">Titulo del cuarto beneficio</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <input type="text" id="name_beneficio4" name="name_beneficio4" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Titulo">
                                </div>
                            </div>
                            <div class="md:col-span-5">
                                <label for="name_beneficio4">Cuarto beneficio</label>
                                <div class="relative mb-2 mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <textarea type="text" rows="2" id="description_beneficio4" name="description_beneficio4" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Cuarto beneficio"></textarea>
                                </div>
                            </div>
                            <!-- </div> -->


                            <!-- -------------------- -->
                            <div class="md:col-span-5 text-right mt-6">
                                <div class="inline-flex items-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar
                                        servicio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    @vite(['resources/js/app.js']) {{-- Incluye tu app.js si usas Vite --}}

    <script>
        $('document').ready(function() {

            tinymce.init({
                selector: 'textarea#description',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'table'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px;}',
                license_key: 'gpl'
            });
            tinymce.init({
                selector: 'textarea#process',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'table'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px;}'
            });



        })
    </script>
    <!-- Script para manejar el envío del formulario con AJAX -->
    <script></script>

</x-app-layout>
