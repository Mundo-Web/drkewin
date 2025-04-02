<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('about.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Datos Acerca de
                        Nosotros</h2>
                </header>
                <div class="p-3">
                    <div>
                        <div class="">
                            <div>
                                <div>

                                    <div class=" rounded shadow-lg p-4 px-4 ">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1">

                                            <div class="lg:col-span-1">
                                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">


                                                    <div class="md:col-span-5">
                                                        <label for="titulo">Título</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="titulo" name="titulo"
                                                                value="{{ $about->titulo }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="subtitulo">Subitutlo</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="subtitulo" name="subtitulo"
                                                                value="{{ $about->subtitulo }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>
                                                    <div class="md:col-span-5">
                                                        <label for="descripcion">Descripcion</label>
                                                        <div class="relative mb-2 mt-2">
                                                            <textarea type="text" rows="2" id="descripcion" name="descripcion" value=""
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Descripción">{{ $about->descripcion }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="md:col-span-5">
                                                        <label for="descripcion_estudios">Descripcion de
                                                            estudios</label>
                                                        <div class="relative mb-2 mt-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>

                                                            <textarea type="text" rows="2" id="descripcion_estudios" name="descripcion_estudios" value=""
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Descripción">{{ $about->descripcion_estudios }}</textarea>

                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="address">Lema</label>
                                                        <div class="relative mb-2 ">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="lema" name="lema"
                                                                value="{{ $about->lema }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="name@flowbite.com">
                                                        </div>
                                                    </div>

                                                    <div class="md:col-span-5">
                                                        <label for="inside">Parrafo del Lema</label>
                                                        <div class="relative mb-2">
                                                            <div
                                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </div>
                                                            <input type="text" id="parrafo" name="parrafo"
                                                                value="{{ $about->parrafo }}"
                                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Interior Oficina 204 - Piso 4">
                                                        </div>
                                                    </div>

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

            tinymce.init({
                selector: 'textarea#descripcion',
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
